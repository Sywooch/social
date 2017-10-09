<?php
/**
 * Контроллер AJAX обращений.
 */
namespace app\controllers;

use app\models\CustomerImage;
use Yii;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;

class AjaxController extends AbstractController
{
    /**
     * Пост данные.
     *
     * @var
     */
    private $_post;

    /**
     * Базовая инициализация.
     *
     * @throws \yii\web\NotFoundHttpException
     */
    public function init()
    {
        parent::init();

        if (!Yii::$app->request->isAjax) {
            throw new \yii\web\NotFoundHttpException();
        }

        $this->_post = Yii::$app->request->post();

        Yii::$app->response->format = Response::FORMAT_JSON;
    }

    /**
     * Загрузка картинки.
     *
     * @return string
     */
    public function actionImageUpload()
    {
        $image = new CustomerImage();
        $image->customerID = $this->registration['customerID'];
        $image->date = date('Y-m-d H:i:s', time());
        $image->isMain = 1;

        if ($image->validate()) {
            $image->save();
            $path = Yii::getAlias('@webroot') . '/uploads/' . $this->registration['customerID'];
            if (!is_dir($path)) {
                BaseFileHelper::createDirectory($path);
            }
            $uploadPhotos = UploadedFile::getInstances($image, 'image');

            if (!empty($uploadPhotos)) {
                foreach ($uploadPhotos as $file) {
                    $photo = md5($file->baseName) . '.' . $file->extension;
                    $file->saveAs($path . '/' . $photo);
                }
            }
            $image->file = $photo;
            $image->save();

            return [$photo];
        }

        return $image->getErrors();
    }
}
