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
class TemplateAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/layout';
    public $css = [
        'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons',
        'https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
        'assets/css/material-dashboard.css?v=2.1.1',
        'assets/demo/demo.css',
        'assets/css/site.css',
        'assets/style.css',
        'assets/src/css/vanilla-calendar-min.css'
    ];
    public $js = [
        //'assets/js/core/jquery.min.js',
        'assets/js/core/popper.min.js',
        'assets/js/core/bootstrap-material-design.min.js',
        'assets/js/plugins/perfect-scrollbar.jquery.min.js',
        'assets/js/plugins/moment.min.js',
        'assets/js/plugins/sweetalert2.js',
        'assets/js/plugins/jquery.validate.min.js',
        'assets/js/plugins/jquery.bootstrap-wizard.js',
        'assets/js/plugins/bootstrap-selectpicker.js',
        'assets/js/plugins/bootstrap-datetimepicker.min.js',
        'assets/js/plugins/jquery.dataTables.min.js',
        'assets/js/plugins/bootstrap-tagsinput.js',
        'assets/js/plugins/jasny-bootstrap.min.js',
        'assets/js/plugins/fullcalendar.min.js',
        'assets/js/plugins/jquery-jvectormap.js',
        'assets/js/plugins/nouislider.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js',
        'assets/js/plugins/arrive.min.js',
        'assets/js/plugins/chartist.min.js',
        'assets/js/plugins/bootstrap-notify.js',
        'assets/js/material-dashboard.js?v=2.1.1',
        'assets/demo/demo.js',
        'assets/src/js/vanilla-calendar-min.js',
        //'assets/js/manipulacao_calendario.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
       
    ];
}
