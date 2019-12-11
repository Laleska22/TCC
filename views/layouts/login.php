<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\LoginAsset;
use yii\helpers\Url;
LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<title>My Awesome Login Page</title>
	<!--================================================================================================== -->
  <?php $this->head() ?>
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
  <?php $this->beginBody() ?>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="icone.png" class="brand_logo" alt="" width="72" height="72">
					</div>
				</div>
<!-- 				<img class="d-flex justify-content-center " src="icone.png" alt="" width="72" height="72" >
 -->
				<div class="d-flex  form_container">

				       <?= $content ?>
				</div>

				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						<a href="#">Cadastre-se</a>

					</div>
				</div>

			</div>


		</div>
		<div class="mt-4">
			<div class="d-flex justify-content-center">

		        <p class="mt-10 mb-3 text-muted">&copy; 2019 | Desenvolvido por Liliane</p>
		    </div>
		</div>
	</div>
  <?php $this->endBody() ?>
</body>
<?php $this->endPage() ?>
