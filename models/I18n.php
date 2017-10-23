<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "main_i18n".
 *
 * @property string $id
 * @property string $category
 *
 * @property I18nTranslation[] $mainI18nTranslations
 */
class I18n extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_i18n';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['category'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category' => Yii::t('app', 'Category'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslations()
    {
        return $this->hasMany(I18nTranslation::className(), ['sourceId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslation()
    {
        return $this->hasOne(I18nTranslation::className(), ['sourceId' => 'id'])
            ->andOnCondition(['main_i18n_translation.language' => \Yii::$app->language]);
    }

    /**
     * Парсит файл возвращает массив сообщений, ключи категориии.
     *
     * Возвращает массив [ категория => [сообщения] ].
     *
     * @param string $fileName   Файл для парсинга.
     * @param string $translator Поисковая строка перевода.
     *
     * @return array
     */
    public function extractMessages($fileName, $translator = 'Yii::t')
    {
        $subject = file_get_contents($fileName);
        $messages = array();
        if (is_array($translator) === false) {
            $translator = array($translator);
        }

        foreach ($translator as $currentTranslator) {
            $pattern = '/\b' .
                $currentTranslator .
                '\s*\(\s*(\'[\w.\/]*?(?<!\.)\'|"[\w.]*?(?<!\.)")\s*,\s*(\'.*?(?<!\\\\)\'|".*?(?<!\\\\)")\s*[,\)]/s';
            $countMatches = preg_match_all(
                $pattern,
                $subject,
                $matches,
                PREG_SET_ORDER
            );

            for ($i = 0; $i < $countMatches; ++$i) {
                if (($pos = strpos($matches[$i][1], '.')) !== false) {
                    $category = substr($matches[$i][1], $pos + 1, -1);
                } else {
                    $category = substr($matches[$i][1], 1, -1);
                }
                $message = $matches[$i][2];
                $messageUnquoted = $this->parseString($message);
                if ($messageUnquoted !== false) {
                    $messages[$category][] = $messageUnquoted;
                }

            }
        }
        return $messages;
    }

    /**
     * Парсит строку с помощью токенов, для обработки конкатенации.
     *
     * @param string $input Данные файла.
     *
     * @return string
     */
    public function parseString($input)
    {
        $tokenString = '';
        $tokens = token_get_all('<?php ' . $input . '?>');

        foreach ($tokens as $token) {
            switch ($token[0]) {
                case T_LNUMBER:
                    $tokenString .= $token[1];
                    break;
                case T_CONSTANT_ENCAPSED_STRING:
                    $tokenString .= stripcslashes(substr($token[1], 1, -1));
                    break;
            }
        }

        return $tokenString;
    }

    /**
     * Функция получает массив переводов и сохраняет его в базу.
     *
     * @param array $messages Сообщения.
     *
     * @return void
     */
    public function saveToDb($messages)
    {
        foreach ($messages as $category => $strings) {
            foreach ($strings as $string) {
                $i18 = new I18n();
                $i18->category = $category;
                $i18->save();

                $i18Translation = new I18nTranslation();
                $i18Translation->sourceId = $i18->id;
                $i18Translation->language = \Yii::$app->language;
                $i18Translation->message = $string;
                $i18Translation->save();
            }
        }
    }

    /**
     * Удаляет указанные сообщения из БД.
     *
     * @param array $messages Массив с новыми сообщениями.
     *
     * @return mixed
     */
    public function deleteFromDb($messages)
    {
        $sql = '
            DELETE main_i18n.*, main_i18n_translation
            FROM main_i18n
            LEFT JOIN main_i18n_translation
                ON main_i18n.id = main_i18n_translation.sourceId
            WHERE main_i18n.category = :category AND main_i18n_translation.message = :message
        ';

        foreach ($messages as $category => $strings) {
            foreach ($strings as $string) {
                $params = [
                    ':category' => $category,
                    ':message' => $string
                ];

                $command = \Yii::$app->db->createCommand($sql)->execute();
                $command->bindValues($params);
                $command->execute();
            }
        }
    }

    /**
     * Находит дубли в таблице переводов и удаляет их, оставив по одному оригинальному экземпляру переводов.
     *
     * @return void
     */
    public function deleteDuplicates()
    {
        $sql = '
          DROP TEMPORARY TABLE IF EXISTS tmp;
            CREATE TEMPORARY TABLE tmp AS (
                SELECT main_i18n_translation.id, language, message, category, COUNT(*) as count
                FROM main_i18n_translation
                INNER JOIN main_i18n
                    ON main_i18n_translation.sourceId = main_i18n.id
                WHERE message IS NOT NULL AND language = \'ru\'
                GROUP BY language, message, category
                HAVING count > 1
            );

            DELETE main_i18n_translation.*, main_i18n.*
            FROM main_i18n_translation
            INNER JOIN (main_i18n, tmp)
                ON main_i18n_translation.sourceId = main_i18n.id
            WHERE tmp.language = main_i18n_translation.language
                AND tmp.message = main_i18n_translation.message
                AND tmp.category = main_i18n.category
                AND tmp.id <> main_i18n_translation.id
        ';

        $numberChanges = \Yii::$app->db->createCommand($sql)->execute();
        if ($numberChanges > 0) {
            echo "\nОбнаружено и удалено " . $numberChanges . " дублей переводов.\n\n";
        } else {
            echo "\nДублей переводов не обнаружено.\n\n";
        }
    }
}
