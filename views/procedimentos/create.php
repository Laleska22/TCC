<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Procedimentos */

$this->title = Yii::t('app', 'Create Procedimentos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Procedimentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procedimentos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
