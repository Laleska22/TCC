<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConsultaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consulta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idConsulta') ?>

    <?= $form->field($model, 'Paciente_idPaciente') ?>

    <?= $form->field($model, 'Medico_idMedico') ?>

    <?= $form->field($model, 'Data_Consulta') ?>

    <?= $form->field($model, 'Hora_Consulta') ?>

    <?php // echo $form->field($model, 'Diagnostico') ?>

    <?php // echo $form->field($model, 'Tipo_Consulta') ?>

    <?php // echo $form->field($model, 'Atestado') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
