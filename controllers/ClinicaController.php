<?php

namespace app\controllers;

use Yii;
use app\models\Clinica;
use app\models\ClinicaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClinicaController implements the CRUD actions for Clinica model.
 */
class ClinicaController extends Controller
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
        ];
    }

    /**
     * Lists all Clinica models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClinicaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Clinica model.
     * @param integer $idClinica
     * @param integer $Agenda_idAgenda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idClinica, $Agenda_idAgenda)
    {
        return $this->render('view', [
            'model' => $this->findModel($idClinica, $Agenda_idAgenda),
        ]);
    }

    /**
     * Creates a new Clinica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Clinica();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idClinica' => $model->idClinica, 'Agenda_idAgenda' => $model->Agenda_idAgenda]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Clinica model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idClinica
     * @param integer $Agenda_idAgenda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idClinica, $Agenda_idAgenda)
    {
        $model = $this->findModel($idClinica, $Agenda_idAgenda);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idClinica' => $model->idClinica, 'Agenda_idAgenda' => $model->Agenda_idAgenda]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Clinica model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idClinica
     * @param integer $Agenda_idAgenda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idClinica, $Agenda_idAgenda)
    {
        $this->findModel($idClinica, $Agenda_idAgenda)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Clinica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idClinica
     * @param integer $Agenda_idAgenda
     * @return Clinica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idClinica, $Agenda_idAgenda)
    {
        if (($model = Clinica::findOne(['idClinica' => $idClinica, 'Agenda_idAgenda' => $Agenda_idAgenda])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
