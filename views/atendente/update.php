<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Atendente */

$this->title = Yii::t('app', 'Update Atendente: {name}', [
    'name' => $model->idAtendente,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atendentes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAtendente, 'url' => ['view', 'id' => $model->idAtendente]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="atendente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
