<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Clinica */

$this->title = $model->idClinica;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clinicas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="clinica-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idClinica' => $model->idClinica, 'Agenda_idAgenda' => $model->Agenda_idAgenda], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idClinica' => $model->idClinica, 'Agenda_idAgenda' => $model->Agenda_idAgenda], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idClinica',
            'Nome',
            'CNPJ',
            'Telefone',
            'Especialidade',
            'Endereco',
            'LogoMarca',
            'Email_Clinica:email',
            'UF',
            'CEP',
            'Agenda_idAgenda',
        ],
    ]) ?>
 
</div>
