<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clinica */

$this->title = Yii::t('app', 'Update Clinica: {name}', [
    'name' => $model->idClinica,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clinicas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idClinica, 'url' => ['view', 'idClinica' => $model->idClinica, 'Agenda_idAgenda' => $model->Agenda_idAgenda]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="clinica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
