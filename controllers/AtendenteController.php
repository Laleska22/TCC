<?php

namespace app\controllers;

use Yii;
use app\models\Consulta; //adicionei essa importação
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * ClinicaController implements the CRUD actions for Clinica model.
 */
class AtendenteController extends Controller
{
    public $layout = 'template';

    public function actionIndex() {
        //consulta ao modelo
        return $this->render('index',[
        'consultas'=> Consulta::listaConsultasDia(),
        ]);
    }
}
