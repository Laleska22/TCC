<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    <?php if(Yii::$app->user->isGuest){
      echo  $form->field($model, 'tipo')->dropdownList(['paciente'=>'Paciente']);
    }else{
        echo  $form->field($model, 'tipo')->dropdownList(['paciente'=>'Paciente','medico'=>'Medico','atendente'=>'Atendente']);
    }

?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
