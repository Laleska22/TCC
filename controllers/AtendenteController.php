<?php

namespace app\controllers;

use Yii;
use app\models\Atendente;
use app\models\AtendenteSearch;
use app\models\Consulta; //adicionei essa importação
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\models\Paciente;
use app\models\Medico;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl; 


/**
 * ClinicaController implements the CRUD actions for Clinica model.
 */
class AtendenteController extends Controller
{
    public $layout = 'template';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['atendente-index'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['atendente-view'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['atendente-create'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['atendente-update'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['atendente-delete'],
                    ],

                    [
                        'allow' => true,
                        'actions' => ['agenda'],
                        'roles' => ['atendente-agenda'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['marcar'],
                        'roles' => ['atendente-marcar'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['prontuario'],
                        'roles' => ['atendente-prontuario'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['buscar'],
                        'roles' => ['atendente-buscar'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['inicio'],
                        'roles' => ['atendente-inicio'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Atendente models.
     * @return mixed
     */
   

    /**
     * Displays a single Atendente model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Atendente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Atendente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idAtendente]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Atendente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idAtendente]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Atendente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionInicio()
    {
        $searchModel = new AtendenteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('inicio', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
       
    }

    /**
     * Finds the Atendente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Atendente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Atendente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionIndex() {
        //consulta ao modelo
        return $this->render('index'); //http://localhost/TCC/web/?r=atendente
    }
        //essa função chama a busca, a busca esta sendo feita em: models->Consulta.php
    public function actionBuscar($data){
        $consutas=Consulta::listaConsultasDia($data);
        echo Json::encode($consutas); //transformando o array em um arquivo Json
    }
    public function actionMarcar() {  //para aparecer a view no navegador acessa http://localhost/TCC/web/?r=atendente/marcar
        $consulta = new Consulta();
        $medicos = ArrayHelper::map(Medico::listAll(),'idMedico','Nome_Medico');
        $pacientes = ArrayHelper::map(Paciente::listAll(),'idPaciente','Nome');
        if ($consulta->load(Yii::$app->request->post()) && $consulta->save()) {
            //redireciona
        }
        return $this->render('marcarConsulta',['consulta'=>$consulta,'pacientes'=>$pacientes,'medicos'=>$medicos]);

        
    }
    public function actionProntuario(){  //para renderizar a view no navegador acessa http://localhost/TCC/web/?r=atendente/prontuario
        return $this->render('prontuario');
    }
    public function actionAgenda(){
        return $this->render('agenda');
    }
    
}
