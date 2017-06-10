<?php
namespace app\assets;

use yii\base\Exception;
use yii\web\AssetBundle;


/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class AdminLteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'dist/css/AdminLTE.min.css',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
        'dist/css/skins/_all-skins.min.css',
        'plugins/datatables/dataTables.bootstrap.css',
    ];
    public $js = [
        'dist/js/app.min.js',
        'plugins/datatables/dataTables.bootstrap.min.js',
        'plugins/datatables/jquery.dataTables.min.js',
        'js/coba.js',
    ];
    public $depends = [
        'rmrevin\yii\fontawesome\AssetBundle',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    /**
     * @var string|bool Choose skin color, eg. `'skin-blue'` or set `false` to disable skin loading
     * @see https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html#layout
     */
}
