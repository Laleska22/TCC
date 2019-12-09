<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Consulta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consulta-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'Medico_idMedico')->textInput() ?>

    <?= $form->field($model, 'Data_Consulta')->textInput() ?>

    <?= $form->field($model, 'Hora_Consulta')->textInput() ?>

    <?= $form->field($model, 'Diagnostico')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Tipo_Consulta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Atestado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
