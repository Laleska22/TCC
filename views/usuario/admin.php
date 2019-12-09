<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="content">
      <div class="container-fluid">
              <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2" class="active"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src=" <?php echo Url::to('@web/layout/assets/img/roxo.jpg', true); ?>" alt="Primeiro Slide">              <div class="carousel-caption d-none d-md-block">
            <img class="mb-4" src="img/estetoscópio.png" alt="" width="100" height="100">    
            <h5>Bem-Vindo Administrador</h5>
              </div>
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src=" <?php echo Url::to('@web/layout/assets/img/roxo.jpg', true); ?>" alt="Segundo Slide">              <div class="carousel-caption d-none d-md-block">
            <img class="mb-4" src="img/estetoscópio.png" alt="" width="100" height="100">    
            <p>Pode navegar no menu lateral</p>
              </div>
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src=" <?php echo Url::to('@web/layout/assets/img/roxo.jpg', true); ?>" alt="Terceiro Slide">
            <div class="carousel-caption d-none d-md-block">
            <img class="mb-4" src="img/estetoscópio.png" alt="" width="100" height="100">    
            <p>Você é administrador e tem total controle do sistema!</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
</div>

  