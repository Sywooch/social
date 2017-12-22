<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/web/css/style.css',
        '/web/css/dev.css',
    ];
    public $js = [
		'/web/js/jquery.formstyler.min.js',
		'/web/js/jquery.mCustomScrollbar.concat.min.js',
		'/web/js/swiper.min.js',
		'/web/js/jquery.arcticmodal-0.3.min.js',
		'/web/js/pickmeup.js',
		'/web/js/imagesloaded.pkgd.min.js',
		'/web/js/masonry.pkgd.js',
		'/web/js/cropper.min.js',
		'/web/js/main.js',
		'/web/js/imageUploader.js',
		'/web/js/script.js',
   ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}

