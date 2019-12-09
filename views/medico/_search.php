<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MedicoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idMedico') ?>

    <?= $form->field($model, 'CRM') ?>

    <?= $form->field($model, 'Nome') ?>

    <?= $form->field($model, 'Especialidade') ?>

    <?= $form->field($model, 'Telefone') ?>

    <?php // echo $form->field($model, 'Imagem') ?>

    <?php // echo $form->field($model, 'CPF') ?>

    <?php // echo $form->field($model, 'Senha') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
