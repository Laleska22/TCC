<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/layout';
    public $css = [
      'login/login.css',
      'https://use.fontawesome.com/releases/v5.6.1/css/all.css',
      'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'

    ];
    public $js = [
      'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',

    ];
}
