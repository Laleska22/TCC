<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clinica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clinica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CNPJ')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Especialidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Endereco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LogoMarca')->fileInput() ?>

    <?= $form->field($model, 'Email_Clinica')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UF')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CEP')->textInput() ?>

    <?= $form->field($model, 'Agenda_idAgenda')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
