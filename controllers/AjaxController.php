<?php
/**
 * Контроллер AJAX обращений.
 */
namespace app\controllers;

use Yii;
use yii\web\Response;

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
    }
}
