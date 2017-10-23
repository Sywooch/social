<?php
namespace app\commands;

use app\models\I18n;
use yii\console\Controller;
use yii\helpers\FileHelper;

class TranslationController extends Controller
{
    /**
     * Конфиг.
     *
     * @var array
     */
    public $config;

    /**
     * Модель интернационализации.
     *
     * @var I18n
     */
    public $i18n;

    /**
     * Инициализация.
     *
     * @return void
     * @since 1.6.2
     */
    public function init()
    {
        $this->i18n = new I18n();

        $this->config = [
            'fileTypes' => ['*.php'],
            'translator' => 'Yii::t',
            'except' => [
                'vendor/*',
                'assets/*',
                'config/*',
                'runtime/*',
            ]
        ];
    }

    /**
     * Находит и сохраняет сообщения переводов.
     *
     * @return void
     * @since 1.10.0
     */
    private function findAndSaveMessages()
    {
        $count = 0;
        $messages = $this->import();

        foreach ($messages as $strings) {
            $count += count($strings);
        }

        echo $count . " new messages\n";
        if ($count > 0) {
            $this->i18n->saveToDb($messages);
        }
    }

    public function actionImport()
    {
        $this->config['sourcePath'] = realpath(__DIR__ . '/../');
        $this->findAndSaveMessages();

        if (empty($duplicates) === true) {
            $this->i18n->deleteDuplicates();
        }
    }

    /**
     * Импортирует новые строки из исходников.
     *
     * @return array
     */
    public function import()
    {
        $options = array();
        $options['only'] = $this->config['fileTypes'];
        $options['except'] = $this->config['except'];

        $files = FileHelper::findFiles(realpath($this->config['sourcePath']), $options);

        $sourceMessages = array();
        foreach ($files as $file) {
            echo "Extracting messages from $file...\n";
            $sourceMessages = array_merge_recursive(
                $sourceMessages,
                $this->i18n->extractMessages($file, $this->config['translator'])
            );
        }

        foreach ($sourceMessages as $category => $messages) {
            $sourceMessages[$category] = array_unique($messages);
        }

        $i18nMessages = I18n::find()->with('translation')->asArray()->all();
        $dbMessages = array();
        foreach ($i18nMessages as $message) {
            $dbMessages[$message['category']][] = $message['translation']['message'];
        }

        $diff = array();
        foreach ($sourceMessages as $category => $messages) {
            if (empty($dbMessages[$category]) === true) {
                $dbMessages[$category] = array();
            }

            $diff[$category] = array_diff($sourceMessages[$category], $dbMessages[$category]);
        }
//        var_dump($diff); exit;
        return $diff;
    }
}
