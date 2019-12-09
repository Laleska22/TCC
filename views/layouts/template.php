<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\TemplateAsset;
use yii\helpers\Url;

TemplateAsset::register($this);
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

<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
     
    <div class="logo">
        <a href="#" class="simple-text logo-normal"> <!-- implementar para aparecer o nome de quem ta logado-->
        <img class="mb-4" src="img/estetoscópio.png" alt="" width="72" height="72">
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
<!-- ATENDENTE MENU -->
<?php
if (Yii::$app->user->can('atendente-create')) {

?>
          <li class="nav-item active ">
            <a class="nav-link" href="<?=Url::toRoute('atendente/create')?>">
              <i class="material-icons">dashboard</i>
              <p>Criar Atendente</p>
            </a>
          </li>
<?php
}
?>
<!--  -->
<?php
if (Yii::$app->user->can('paciente-create')) {

?>
          <li class="nav-item active ">
            <a class="nav-link" href="<?=Url::toRoute('paciente/create')?>">
              <i class="material-icons">dashboard</i>
              <p>Criar Paciente</p>
            </a>
          </li>
<?php
}
?>
<!--  -->
<?php
if (Yii::$app->user->can('medico-create')) {

?>
          <li class="nav-item active ">
            <a class="nav-link" href="<?=Url::toRoute('medico/create')?>">
              <i class="material-icons">dashboard</i>
              <p>Criar Médico</p>
            </a>
          </li>
<?php
}
?>
<!--  -->

<!--  -->
<?php

if (Yii::$app->user->can('atendente-agenda')) {
  ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?=Url::toRoute('atendente/agenda')?>">
              <i class="material-icons">chrome_reader_mode</i>
              <p>Consultar agenda</p>
            </a>
          </li>
<?php
}
?>
<!--  -->
<?php

if (Yii::$app->user->can('atendente-marcar')) {
  ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?=Url::toRoute('atendente/marcar')?>">
              <i class="material-icons">storage</i>
              <p>Marcar consulta</p>
            </a>
          </li>

<?php
}
?>
<!--  -->
<?php
if (Yii::$app->user->can('atendente-prontuario')) {
  ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?=Url::toRoute('atendente/prontuario')?>">
              <i class="material-icons">assignment</i>
              <p>Prontuário eletrônico</p>
            </a>
          </li>
<?php
}
?>

<!--  -->
<!-- MEDICO MENU -->

<!--  -->

<!--  -->
<?php

if (Yii::$app->user->can('medico-agendamed')) {
  ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?=Url::toRoute('medico/agendamed')?>">
              <i class="material-icons">chrome_reader_mode</i>
              <p>Consultar agenda</p>
            </a>
          </li>
<?php
}
?>
<!--  -->

<!--  -->
<?php
if (Yii::$app->user->can('medico-prontuario')) {
  ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?=Url::toRoute('medico/prontuario')?>">
              <i class="material-icons">assignment</i>
              <p>Buscar prontuário</p>
            </a>
          </li>
<?php
}
?>
<!--  -->
<?php
if (Yii::$app->user->can('medico-enviarprocedimento')) {
  ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?=Url::toRoute('medico/enviarprocedimento')?>">
              <i class="material-icons">list_alt</i>
              <p>Procedimentos</p>
            </a>
          </li>
<?php
}
?>
<!--  -->
<!--  -->
<!-- PACIENTE MENU -->

<!--  -->

<!--  -->
<?php

if (Yii::$app->user->can('paciente-agendapac')) {
  ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?=Url::toRoute('paciente/agendapac')?>">
              <i class="material-icons">chrome_reader_mode</i>
              <p>Consultar agenda</p>
            </a>
          </li>
<?php
}
?>
<!--  -->
<?php

if (Yii::$app->user->can('paciente-marcar')) {
  ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?=Url::toRoute('paciente/marcar')?>">
              <i class="material-icons">storage</i>
              <p>Marcar consulta</p>
            </a>
          </li>

<?php
}
?>
<!--  -->
<?php
if (Yii::$app->user->can('paciente-prontuario')) {
  ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?=Url::toRoute('paciente/prontuario')?>">
              <i class="material-icons">assignment</i>
              <p>Acessar Prontuário</p>
            </a>
          </li>
<?php
}
?>
<!--  -->
<!--  -->
<?php

if (Yii::$app->user->can('paciente-procedimento')) {
  ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?=Url::toRoute('paciente/procedimento')?>">
              <i class="material-icons">storage</i>
              <p>verificar procedimentos</p>
            </a>
          </li>

<?php
}
?>
<!--  -->

<!--  -->


          <li class="nav-item ">
            <a class="nav-link" href="<?=Url::toRoute('site/logout')?>">
              <i class="material-icons">exit_to_app</i>
              <p>Sair</p>
            </a>
          </li>
         </div>
    </div>
    <div class="main-panel">
     
      <div class="mx-3 main">
            <?= $content ?>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  ADMINISTRAÇÃO
                </a>
              </li>
            </ul>
          </nav>
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  SOBRE
                </a>
              </li>
            </ul>
          </nav>
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  CONTATO
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script> <i class="material-icons">favorite</i> Desenvolvido por Liliane
          </div>
        </div>
      </footer>
    </div>
  </div>
  
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
