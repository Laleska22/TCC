<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Atendente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atendente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Sexo')->dropDownList([ 'M' => 'M', 'F' => 'F', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Endereco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DataNasc')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
