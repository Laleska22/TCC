<?php

namespace app\controllers;

use Yii;
use app\models\Consulta; //adicionei essa importação
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * ClinicaController implements the CRUD actions for Clinica model.
 */
class AtendenteController extends Controller
{
    public $layout = 'template';

    public function actionIndex() {
        //consulta ao modelo
        return $this->render('index');
    }

    public function actionBuscar($data){
        $consutas=Consulta::listaConsultasDia($data);
        echo Json::encode($consutas);
       
        
    }

}
