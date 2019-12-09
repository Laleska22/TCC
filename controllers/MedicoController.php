<?php

namespace app\controllers;

use Yii;
use app\models\Medico;
use app\models\MedicoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Consulta; 
use app\models\Paciente;
use app\models\Procedimentos;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl; 
use yii\helpers\Json;



/**
 * MedicoController implements the CRUD actions for Medico model.
 */
class MedicoController extends Controller
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
                        'roles' => ['medico-index'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['medico-view'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['medico-create'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['medico-update'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['medico-delete'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['agendamed'],
                        'roles' => ['medico-agendamed'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['telamedico'],
                        'roles' => ['medico-telamedico'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['prontuario'],
                        'roles' => ['medico-prontuario'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['enviarprocedimento'],
                        'roles' => ['medico-enviarprocedimento'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['buscar'],
                        'roles' => ['medico-buscar'],
                    ],
                ],
            ],
        ];
    }
    
    //Permissao de paciente
    /**
     * Lists all Medico models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MedicoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Medico model.
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
     * Creates a new Medico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Medico();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idMedico]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Medico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idMedico]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Medico model.
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

    /**
     * Finds the Medico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Medico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Medico::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    public function actionTelamedico(){   //http://localhost/TCC/web/?r=medico/telamedico
        return $this->render('telaMedico');
    }
    public function actionBuscar($data){
        $consutas=Consulta::listaConsultasDia($data);
        echo Json::encode($consutas); //transformando o array em um arquivo Json
    }
    public function actionAgendamed(){  //http://localhost/TCC/web/?r=medico/agendamed
        return $this->render('agendamed');
    }
    public function actionProntuario() {  //http://localhost/TCC/web/?r=medico/buscarprontuario
        $consulta = new Consulta();
        $pacientes = ArrayHelper::map(Paciente::listAll(),'idPaciente','Nome');
        return $this->render('prontuario',['consulta'=>$consulta,'pacientes'=>$pacientes]);
    }
    public function actionEnviarprocedimento(){
        $consulta = new Consulta();
        $procedimento = ArrayHelper::map(Procedimentos::listAll(),'idProcedimentos','Nome_procedimento');
        $pacientes = ArrayHelper::map(Paciente::listAll(),'idPaciente','Nome');

        if ($consulta->load(Yii::$app->request->post())) {
            //redirecionar para alguma tela
            var_dump($consulta);


        }

     
        return $this->render('enviarprocedimento',['consulta'=>$consulta,'pacientes'=>$pacientes,'procedimento'=>$procedimento]);
       
    
    }
}
