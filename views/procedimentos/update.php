<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Procedimentos */

$this->title = Yii::t('app', 'Update Procedimentos: {name}', [
    'name' => $model->idProcedimentos,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Procedimentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProcedimentos, 'url' => ['view', 'id' => $model->idProcedimentos]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="procedimentos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
