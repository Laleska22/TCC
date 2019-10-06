<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClinicaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clinica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idClinica') ?>

    <?= $form->field($model, 'Nome') ?>

    <?= $form->field($model, 'CNPJ') ?>

    <?= $form->field($model, 'Telefone') ?>

    <?= $form->field($model, 'Especialidade') ?>

    <?php // echo $form->field($model, 'Endereco') ?>

    <?php // echo $form->field($model, 'LogoMarca') ?>

    <?php // echo $form->field($model, 'Email_Clinica') ?>

    <?php // echo $form->field($model, 'UF') ?>

    <?php // echo $form->field($model, 'CEP') ?>

    <?php // echo $form->field($model, 'Agenda_idAgenda') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
