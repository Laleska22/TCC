<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MedicoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Medicos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medico-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Medico'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idMedico',
            'CRM',
            'Nome_Medico',
            'Especialidade',
            'Telefone',
            //'Imagem',
            //'CPF',
            //'Senha',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
