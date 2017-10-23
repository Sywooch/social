<?php
namespace app\components;

class I18n extends \yii\i18n\PhpMessageSource
{
    /**
     * Префикс в ключе кэша.
     *
     * @const string
     */
    const CACHE_KEY_PREFIX = 'app.I18n';

    /**
     * Время работы кэша.
     *
     * Если 0 - кэшь не используется.
     *
     * @var integer
     */
    public $cacheDuration = 60;

    protected function loadMessages($category, $language)
    {
        $key = implode('.', array(self::CACHE_KEY_PREFIX, $category, $language));
        if ($this->cacheDuration > 0) {
                $data = \Yii::$app->cache->get($key);
                if ($data !== false) {
                    return unserialize($data);
                }
        }

        $messages = $this->getMessagesFromDb($category, $language);

        \Yii::$app->cache->set($key, serialize($messages), $this->cacheDuration);

        return $messages;
    }

    protected function getMessagesFromDb($category, $language)
    {
        $limit = 500;
        $offset = 0;
        $messages = array();
        $translationTable = 'main_i18n_translation';
        $mainTable = 'main_i18n';

        $sql = "
SELECT `sourceTable`.`message` AS `source`,
        `translationTable`.`message` AS `translation`
    FROM `{$mainTable}`
        INNER JOIN `{$translationTable}` AS `translationTable` ON
            `{$mainTable}`.`id` = `translationTable`.`sourceId` AND
            `translationTable`.`language` = :language
        INNER JOIN `{$translationTable}` AS `sourceTable` ON
            `{$mainTable}`.`id` = `sourceTable`.`sourceId` AND
            `sourceTable`.`language` = :sourceLanguage
    WHERE `{$mainTable}`.`category` = :category
    GROUP BY `source`
    LIMIT :offset, {$limit}
        ";

        $command = \Yii::$app->db->createCommand($sql);
        $values = array(
            ':language' => $language,
            ':sourceLanguage' => $this->sourceLanguage,
            ':category' => $category
        );
        $command->bindValues($values);
        $command->bindParam(':offset', $offset, \PDO::PARAM_INT);

        $data = $command->queryAll();

        while (count($data) > 0) {
            foreach ($data as $row) {
                $messages[$row['source']] = $row['translation'];
            }

            $offset += $limit;
            $data = $command->queryAll();
        }

        return $messages;
    }

    /**
     * Регистрирует перевод для js.
     *
     * @param $category
     *
     * @return string
     */
    public static function getI18n($category)
    {
        $i18n = [$category => []];
        $language = \Yii::$app->language;
        $i18nClass = new self;
        $i18n[$category][$language] = $i18nClass->loadMessages($category, $language);

        $i18n = json_encode($i18n, JSON_UNESCAPED_UNICODE);

        return "
        $(function () {
            var install = function () {
                emict.addI18n({$i18n});
            };
            if (emict === null) {
                $(window).one('emict.init', install);
            } else {
                install();
            }
            $(window).trigger('emict.tready');
        });";

    }
}
