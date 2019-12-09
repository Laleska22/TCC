<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClinicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clinicas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clinica-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Clinica'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idClinica',
            'Nome',
            'CNPJ',
            'Telefone',
            'Especialidade',
            //'Endereco',
            //'LogoMarca',
            //'Email_Clinica:email',
            //'UF',
            //'CEP',
            //'Agenda_idAgenda',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
