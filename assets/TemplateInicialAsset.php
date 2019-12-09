<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com,
 * @since 2.0
 */
class TemplateInicialAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/layout';
    public $css = [
    "assets2/css/bootstrap.min.css",
    "assets2/css/owl.carousel.min.css",
    "assets2/css/magnific-popup.css",
    "assets2/css/font-awesome.min.css",
    "assets2/css/themify-icons.css",
    "assets2/css/nice-select.css",
    "assets2/css/flaticon.css",
    "assets2/css/gijgo.css",
    "assets2/css/animate.css",
    "assets2/css/slicknav.css",
    "assets2/css/style.css",
        
    ];
    public $js = [
    "assets2/js/vendor/modernizr-3.5.0.min.js",
    "assets2/js/vendor/jquery-1.12.4.min.js",
    "assets2/js/popper.min.js",
    "assets2/js/bootstrap.min.js",
    "assets2/js/owl.carousel.min.js",
    "assets2/js/isotope.pkgd.min.js",
    "assets2/js/ajax-form.js",
    "assets2/js/waypoints.min.js",
    "assets2/js/jquery.counterup.min.js",
    "assets2/js/imagesloaded.pkgd.min.js",
    "assets2/js/scrollIt.js",
    "assets2/js/jquery.scrollUp.min.js",
    "assets2/js/wow.min.js",
    "assets2/js/nice-select.min.js",
    "assets2/js/jquery.slicknav.min.js",
    "assets2/js/jquery.magnific-popup.min.js",
    "assets2/js/plugins.js",
    "assets2/js/gijgo.min.js",
    "assets2/js/contact.js",
    "assets2/js/jquery.ajaxchimp.min.js",
    "assets2/js/jquery.form.js",
    "assets2/js/jquery.validate.min.js",
    "assets2/js/mail-script.js",
    "assets2/js/main.js",
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
       
    ];
}
