<?php

namespace app\controllers;

use Yii;
use app\models\Paciente;
use app\models\PacienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl; 
use app\models\Medico;
use yii\helpers\ArrayHelper;
use app\models\Consulta;
use yii\helpers\Json;
use app\models\Procedimentos;




/**
 * PacienteController implements the CRUD actions for Paciente model.
 */
class PacienteController extends Controller
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
                        'roles' => ['paciente-index'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['paciente-view'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['paciente-create'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['paciente-update'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['paciente-delete'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['marcar'],
                        'roles' => ['paciente-marcar'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['prontuario'],
                        'roles' => ['paciente-prontuario'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['agendapac'],
                        'roles' => ['paciente-agendapac'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['procedimento'],
                        'roles' => ['paciente-procedimento'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Paciente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PacienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Paciente model.
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
     * Creates a new Paciente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Paciente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPaciente]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Paciente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPaciente]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Paciente model.
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
    public function actionMarcar() {  //para aparecer a view no navegador acessa http://localhost/TCC/web/?r=atendente/marcar
        $consulta = new Consulta();
        $medicos = ArrayHelper::map(Medico::listAll(),'idMedico','Nome_Medico');
        $pacientes = ArrayHelper::map(Paciente::listAll(),'idPaciente','Nome');
        if ($consulta->load(Yii::$app->request->post()) && $consulta->save()) {
            //redireciona
        }
        return $this->render('marcar',['consulta'=>$consulta,'pacientes'=>$pacientes,'medicos'=>$medicos]);

        
    }
    public function actionBuscar($data){
        $consutas=Consulta::listaConsultasDia($data);
        echo Json::encode($consutas); //transformando o array em um arquivo Json
    }
    public function actionProntuario(){  
        return $this->render('prontuario');
    }
    public function actionAgendapac(){ 
        return $this->render('agendapac');
    }
    public function actionProcedimento(){ 
        $consulta = new Consulta();
        $procedimento = ArrayHelper::map(Procedimentos::listAll(),'idProcedimentos','Nome_procedimento');
        $pacientes = ArrayHelper::map(Paciente::listAll(),'idPaciente','Nome');

        if ($consulta->load(Yii::$app->request->post())) {
            //redirecionar para alguma tela
            var_dump($consulta);


        }

     
        return $this->render('procedimento',['consulta'=>$consulta,'pacientes'=>$pacientes,'procedimento'=>$procedimento]);
       
    
    }

    /**
     * Finds the Paciente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Paciente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Paciente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
