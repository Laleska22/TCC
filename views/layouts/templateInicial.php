<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\TemplateInicialAsset;
use yii\helpers\Url;

TemplateInicialAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
 <!-- Inicio do header -->
 <header>
        <div class="header-area ">

            
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                               <a href="index.html">
                                    <img src="<?php echo Url::to('@web/img/estetoscópio.png', true); ?>" alt="">
                                </a>
                            </div>
                        </div> 
                        
                        <div class="col-xl-4 col-lg-3">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="#">Inicio</a></li>
                                        <li><a class="active" href="#">Sobre</a></li>
                                        <li><a class="active" href="#">Médicos</a></li>
                                        <li><a class="active" href="#">Contatos</a></li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="book_btn d-none d-lg-block">
                                <a class="btn btn-primary" href="<?=Url::toRoute('site/login')?>" role="button">Entrar</a>

                                </div>
                            </div>
                        </div> 
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        
    </header>
    <!-- Fim do header -->
    
            <?= $content ?>
      
      <!-- footer inicio-->
    <footer class="footer">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="footer_widget">
                                <div class="footer_logo">
                                    <a href="#">
                                        <img src="img/footer_logo.png" alt="">
                                    </a>
                                </div>
                                
                                <div class="socail_links">
                                    <ul>
                                        <li>
                                            <a href="https://www.facebook.com/">
                                                <i class="ti-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/">
                                                <i class="ti-twitter-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
    
                            </div>
                        </div>
                        <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <ul>
                                    <li><a href="#">Início</a></li>
                                    <li><a href="#">Sobre</a></li>
                                    <li><a href="#">Médicos</a></li>
                                    <li><a href="#">Contatos</a></li>
                                </ul>
    
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Links úteis
                                </h3>
                                <ul>
                                    <li><a href="#">Central de ajuda</a></li>
                                    <li><a href="#">Funcionalidades</a></li>
                                    <li><a href="#">Termos de uso</a></li>
                                    <li><a href="#">Política de privacidade</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Contatos
                                </h3>
                                <p>
                                     Tel: +55 3437-2427 <br>
                                    +healthMed@gmail.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right_text">
                <div class="container">
                    <div class="footer_border"></div>
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="copy_right text-center">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | Desenvolvido por Liliane
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
</div>
<!-- footer fim  -->
<!-- link que abre o popup -->
    <!-- form itself end-->
    <form id="test-form" class="white-popup-block mfp-hide">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>Make an Appointment</h3>
                <form action="#">
                    <div class="row">
                        <div class="col-xl-6">
                            <input id="datepicker" placeholder="Pick date">
                        </div>
                        <div class="col-xl-6">
                            <input id="datepicker2" placeholder="Suitable time">
                        </div>
                        <div class="col-xl-6">
                            <select class="form-select wide" id="default-select" class="">
                                <option data-display="Select Department"></option>
                                <option value="1">Eye Care</option>
                                <option value="2">Physical Therapy</option>
                                <option value="3">Dental Care</option>
                            </select>
                        </div>
                        <div class="col-xl-6">
                            <select class="form-select wide" id="default-select" class="">
                                <option data-display="Doctors">Doctors</option>
                                <option value="1">Mirazul Alom</option>
                                <option value="2">Monzul Alom</option>
                                <option value="3">Azizul Isalm</option>
                            </select>
                        </div>
                        <div class="col-xl-6">
                            <input type="text"  placeholder="Name">
                        </div>
                        <div class="col-xl-6">
                            <input type="text"  placeholder="Phone no.">
                        </div>
                        <div class="col-xl-12">
                            <input type="email"  placeholder="Email">
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="boxed-btn3">Confirm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
  <!--</div>-->
    <!-- form itself end -->
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }

        });
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
      
  
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
