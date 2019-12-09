<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PacienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paciente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPaciente') ?>

    <?= $form->field($model, 'Nome') ?>

    <?= $form->field($model, 'DataNascimento') ?>

    <?= $form->field($model, 'RG') ?>

    <?= $form->field($model, 'Cidade') ?>

    <?php // echo $form->field($model, 'Idade') ?>

    <?php // echo $form->field($model, 'Sexo') ?>

    <?php // echo $form->field($model, 'Imagem') ?>

    <?php // echo $form->field($model, 'CPF') ?>

    <?php // echo $form->field($model, 'Senha') ?>

    <?php // echo $form->field($model, 'Historico_medico_idHistorico_medico') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
