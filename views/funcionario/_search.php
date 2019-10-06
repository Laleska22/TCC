<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FuncionarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="funcionario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idFuncionario') ?>

    <?= $form->field($model, 'Nome') ?>

    <?= $form->field($model, 'Sexo') ?>

    <?= $form->field($model, 'Endereco') ?>

    <?= $form->field($model, 'DataNasc') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
