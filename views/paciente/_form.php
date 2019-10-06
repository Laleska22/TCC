<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Paciente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paciente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DataNascimento')->textInput() ?>

    <?= $form->field($model, 'RG')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Idade')->textInput() ?>

    <?= $form->field($model, 'Sexo')->dropDownList([ 'M' => 'Masculino', 'F' => 'Feminino', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Imagem')->fileInput() ?>

    <?= $form->field($model, 'CPF')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Senha')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Historico_medico_idHistorico_medico')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <form action="">
        <input type="date">
    </form>

</div>
