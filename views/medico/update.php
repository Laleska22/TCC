<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Medico */

$this->title = Yii::t('app', 'Update Medico: {name}', [
    'name' => $model->idMedico,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Medicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idMedico, 'url' => ['view', 'id' => $model->idMedico]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="medico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
