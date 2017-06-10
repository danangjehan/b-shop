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
        'css/site.css',
        'assetsTemplate/assets/bootstrap/css/bootstrap.css',
        'assetsTemplate/assets/css/style.css',
        'assetsTemplate/assets/css/category-2.css',
    ];
    public $js = [
        'https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js',
        'http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js',
        'assetsTemplate/assets/js/jquery.scrollme.min.js',
        'assetsTemplate/assets/bootstrap/js/bootstrap.min.js',
        'assetsTemplate/assets/js/jquery.parallax-1.1.js',
        'assetsTemplate/assets/js/helper-plugins/jquery.mousewheel.min.js',
        'assetsTemplate/assets/js/jquery.mCustomScrollbar.js',
        'assetsTemplate/assets/plugins/icheck-1.x/icheck.min.js',
        'assetsTemplate/assets/js/grids.js',
        'assetsTemplate/assets/js/owl.carousel.min.js',
        'assetsTemplate/assets/js/bootstrap.touchspin.js',
        'assetsTemplate/assets/js/script.js',
        'assetsTemplate/assets/js/hideMaxListItem-min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
