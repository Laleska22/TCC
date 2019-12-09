<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <!-- slider_area_start -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" src=" <?php echo Url::to('@web/layout/assets2/img/banner/carrousel1.jpg', true); ?>" alt="Primeiro Slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="<?php echo Url::to('@web/layout/assets2/img/banner/carrousel2.jpg', true); ?>" alt="Segundo Slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="<?php echo Url::to('@web/layout/assets2/img/banner/carrousel3.jpg', true); ?>" alt="Terceiro Slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
    </a>
    </div>
    <!-- slider_area_end -->

    <!-- service_area_start -->
    <div class="service_area">
        <div class="container p-0">
            <div class="row no-gutters">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i class="flaticon-electrocardiogram"></i>
                        </div>
                        <h3>Hospitalidade</h3>
                        <p>A excelência clínica deve ser a prioridade de qualquer prestador de serviços de saúde.</p>
                        <a href="#" class="boxed-btn3-white">Entrar em contato</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i class="flaticon-emergency-call"></i>
                        </div>
                        <h3>Comunicação</h3>
                        <p>Manter a comunicação entre o contratante e o contratado é o nosso diferencial. </p>
                        <a href="#" class="boxed-btn3-white">Fale conosco</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i class="flaticon-first-aid-kit"></i>
                        </div>
                        <h3>Trabalho e desempenho</h3>
                        <p>Para alcançar metas é necessário sempre inovar as ideias.</p>
                        <a href="#" class="boxed-btn3-white">Acompanhe </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service_area_end -->

    <!-- welcome_docmed_area_start -->
    <div class="welcome_docmed_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_thumb">
                        <div class="thumb_1">
                            <img src=" <?php echo Url::to('@web/layout/assets2/img/about/1.png', true); ?>" alt="">
                        </div>
                        <div class="thumb_2">
                        <img src=" <?php echo Url::to('@web/layout/assets2/img/about/2.png', true); ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h2>Bem-vindos<h2>
                        <h3>Melhores cuidados com <br>
                                a sua saúde</h3>
                        <p>Somos uma equipe especializada para oferecer os melhores e mais modernos serviços.</p>
                        <ul>
                            <li> <i class="flaticon-right"></i> Melhor gerencia da sua clínica. </li>
                            <li> <i class="flaticon-right"></i> Praticidade no seu dia, contando com mecanismos organizacionais.</li>
                            <li> <i class="flaticon-right"></i> Melhor desempenho da sua clínica. </li>
                        </ul>
                        <a href="#" class="boxed-btn3-white-2">Saber mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_docmed_area_end -->

    <!-- expert_doctors_area_start -->
    <div class="expert_doctors_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="doctors_title mb-55">
                        <h3>Médicos especialistas</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="expert_active owl-carousel">
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src=" <?php echo Url::to('@web/layout/assets2/img/experts/1.png', true); ?>">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Dr. Enrique Pedrosa</h3>
                                <span>Cardiologista</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                            <img src=" <?php echo Url::to('@web/layout/assets2/img/experts/2.png', true); ?>">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Dr. Paulo Afonso</h3>
                                <span>Dentista</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                            <img src=" <?php echo Url::to('@web/layout/assets2/img/experts/3.png', true); ?>">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Dr. Anderson Mirantes</h3>
                                <span>Clínico Geral</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                            <img src=" <?php echo Url::to('@web/layout/assets2/img/experts/4.png', true); ?>">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Dr. Antonio Lacerda</h3>
                                <span>Psiquiatra</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                            <img src=" <?php echo Url::to('@web/layout/assets2/img/experts/6.png', true); ?>">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Dr. Carlos Nobrega</h3>
                                <span>Neurologista</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                            <img src=" <?php echo Url::to('@web/layout/assets2/img/experts/7.png', true); ?>">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Drª. Naomi Patrícia</h3>
                                <span>Pediatra</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- expert_doctors_area_end -->
</div>
   