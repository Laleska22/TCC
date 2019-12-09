<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Usuario;


class SiteController extends Controller
{
     public $layout = 'templateInicial';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {        // $auth->addChild($admin, $viewAdmin); //duvida

        return [
            'access' => [
                'class' => AccessControl::className(),
               'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login','signup'],
                        'roles' => ['?','@'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionPermissao()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        //$auth->removeAllRules();
        //$auth->removeAllRoles();

        

        $admin = $auth->createRole('administrador');
        $atendente = $auth->createRole('atendente');
        $paciente = $auth->createRole('paciente');
        $medico = $auth->createRole('medico');

        $auth->add($admin);
        $auth->add($atendente);
        $auth->add($paciente);
        $auth->add($medico);

        $viewAdmin= $auth->createPermission('administrador-view'); //duvida
        // Permissoes de atendente
        $indexAtendente = $auth->createPermission('atendente-index');
        $inicioAtendente = $auth->createPermission('atendente-inicio');
        $viewAtendente = $auth->createPermission('atendente-view');
        $addAtendente = $auth->createPermission('atendente-create');
        $updateAtendente = $auth->createPermission('atendente-update');
        $deleteAtendente = $auth->createPermission('atendente-delete');
        $buscarAtendente = $auth->createPermission('atendente-buscar'); //
        $marcarAtendente = $auth->createPermission('atendente-marcar'); //
        $prontuarioAtendente = $auth->createPermission('atendente-prontuario'); //
        $agendaAtendente = $auth->createPermission('atendente-agenda');  //
        // Permissoes de clinica
        $indexClinica = $auth->createPermission('clinica-index');
        $viewClinica = $auth->createPermission('clinica-view');
        $addClinica = $auth->createPermission('clinica-create');
        $updateClinica = $auth->createPermission('clinica-update');
        $deleteClinica = $auth->createPermission('clinica-delete');
        //Permissao de consulta
        $indexConsulta = $auth->createPermission('consulta-index');
        $viewConsulta = $auth->createPermission('consulta-view');
        $addConsulta = $auth->createPermission('consulta-create');
        $updateConsulta = $auth->createPermission('consulta-update');
        $deleteConsulta = $auth->createPermission('consulta-delete');
        //Permissao de medico
        $indexMedico = $auth->createPermission('medico-index');
        $viewMedico = $auth->createPermission('medico-view');
        $addMedico = $auth->createPermission('medico-create');
        $updateMedico = $auth->createPermission('medico-update');
        $deleteMedico = $auth->createPermission('medico-delete');
        $telamedicoMedico = $auth->createPermission('medico-telamedico');
        $agendamedMedico = $auth->createPermission('medico-agendamed');
        $prontuarioMedico = $auth->createPermission('medico-prontuario');
        $enviarprocedimentoMedico = $auth->createPermission('medico-enviarprocedimento');
        $buscarMedico = $auth->createPermission('medico-buscar');

        //Permissao de paciente
        $indexPaciente = $auth->createPermission('paciente-index');
        $viewPaciente = $auth->createPermission('paciente-view');
        $addPaciente = $auth->createPermission('paciente-create');
        $updatePaciente = $auth->createPermission('paciente-update');
        $deletePaciente = $auth->createPermission('paciente-delete');
        $marcarPaciente = $auth->createPermission('paciente-marcar');
        $prontuarioPaciente = $auth->createPermission('paciente-prontuario'); //
        $agendapacPaciente = $auth->createPermission('paciente-agendapac');
        $procedimentoPaciente = $auth->createPermission('paciente-procedimento');


        //Permissao de procedimento
        $indexProcedimento = $auth->createPermission('procedimento-index');
        $viewProcedimento = $auth->createPermission('procedimento-view');
        $addProcedimento = $auth->createPermission('procedimento-create');
        $updateProcedimento = $auth->createPermission('procedimento-update');
        $deleteProcedimento = $auth->createPermission('procedimento-delete');
         //Permissao de usuario
         $indexUsuario = $auth->createPermission('usuario-index');
         $viewUsuario = $auth->createPermission('usuario-view');
         $addUsuario = $auth->createPermission('usuario-create');
         $updateUsuario = $auth->createPermission('usuario-update');
         $deleteUsuario = $auth->createPermission('usuario-delete');



         $auth->add($viewAdmin); //duvida

        //ATENDENTE
        $auth->add($indexAtendente);
        $auth->add($inicioAtendente);
        $auth->add($viewAtendente);
        $auth->add($addAtendente);
        $auth->add($updateAtendente);
        $auth->add($deleteAtendente);
        $auth->add($buscarAtendente);
        $auth->add($marcarAtendente);
        $auth->add($prontuarioAtendente);
        $auth->add($agendaAtendente);

        //CLINICA
        $auth->add($indexClinica);
        $auth->add($viewClinica);
        $auth->add($addClinica);
        $auth->add($updateClinica);
        $auth->add($deleteClinica);

        //CONSULTA
        $auth->add($indexConsulta);
        $auth->add($viewConsulta);
        $auth->add($addConsulta);
        $auth->add($updateConsulta);
        $auth->add($deleteConsulta);

        //MEDICO
        $auth->add($indexMedico);
        $auth->add($viewMedico);
        $auth->add($addMedico);
        $auth->add($updateMedico);
        $auth->add($deleteMedico);
        $auth->add($telamedicoMedico);
        $auth->add($agendamedMedico);
        $auth->add($prontuarioMedico);
        $auth->add($enviarprocedimentoMedico);
        $auth->add($buscarMedico);

        //PACIENTE
        $auth->add($indexPaciente);
        $auth->add($viewPaciente);
        $auth->add($addPaciente);
        $auth->add($updatePaciente);
        $auth->add($deletePaciente);
        $auth->add($marcarPaciente);
        $auth->add($prontuarioPaciente);
        $auth->add($agendapacPaciente);
        $auth->add($procedimentoPaciente);



        //PROCEDIMENTO
        $auth->add($indexProcedimento);
        $auth->add($viewProcedimento);
        $auth->add($addProcedimento);
        $auth->add($updateProcedimento);
        $auth->add($deleteProcedimento);

        //USUARIO
        $auth->add($indexUsuario);
        $auth->add($viewUsuario);
        $auth->add($addUsuario);
        $auth->add($updateUsuario);
        $auth->add($deleteUsuario);


        //ADD_CHILD
        // Atendente
        $auth->addChild($atendente, $indexAtendente);
        $auth->addChild($atendente, $inicioAtendente);
        $auth->addChild($atendente, $viewAtendente);
        $auth->addChild($atendente, $addAtendente);
        $auth->addChild($atendente, $updateAtendente);
        $auth->addChild($atendente, $deleteAtendente);  //
        $auth->addChild($atendente, $agendaAtendente);  //
        $auth->addChild($atendente, $marcarAtendente);
        $auth->addChild($atendente, $prontuarioAtendente);
        $auth->addChild($atendente, $buscarAtendente);
        
        $auth->addChild($atendente, $indexConsulta);
        $auth->addChild($atendente, $updateConsulta);
        $auth->addChild($atendente, $deleteConsulta);
        $auth->addChild($atendente, $viewConsulta);
        $auth->addChild($atendente, $addConsulta);
        
        $auth->addChild($atendente, $indexPaciente);
        $auth->addChild($atendente, $viewPaciente);
        $auth->addChild($atendente, $addPaciente);
        $auth->addChild($atendente, $updatePaciente);
        $auth->addChild($atendente, $deletePaciente); ///
        //paciente 
        $auth->addChild($paciente, $indexPaciente);
        $auth->addChild($paciente, $viewPaciente);
        $auth->addChild($paciente, $addPaciente);
        $auth->addChild($paciente, $updatePaciente);
        $auth->addChild($paciente, $deletePaciente); 
        $auth->addChild($paciente, $marcarPaciente);
        $auth->addChild($paciente, $prontuarioPaciente);
        $auth->addChild($paciente, $agendapacPaciente);
        $auth->addChild($paciente, $procedimentoPaciente);



        $auth->addChild($paciente, $viewConsulta);
        $auth->addChild($paciente, $addConsulta);
        $auth->addChild($paciente, $indexConsulta);
        $auth->addChild($paciente, $updateConsulta);
        $auth->addChild($paciente, $deleteConsulta);

        $auth->addChild($paciente, $viewProcedimento);
        $auth->addChild($paciente, $indexProcedimento);
        //medico
        $auth->addChild($medico, $indexMedico);
        $auth->addChild($medico, $viewMedico);
        $auth->addChild($medico, $addMedico);
        $auth->addChild($medico, $updateMedico);
        $auth->addChild($medico, $deleteMedico); 
        $auth->addChild($medico,$agendamedMedico);
        $auth->addChild($medico,$enviarprocedimentoMedico);
        $auth->addChild($medico, $prontuarioMedico);
        $auth->addChild($medico, $buscarMedico);



        $auth->addChild($medico, $viewConsulta);
        $auth->addChild($medico, $indexConsulta);
        $auth->addChild($medico, $updateConsulta);

        $auth->addChild($medico, $addProcedimento);
        $auth->addChild($medico, $viewProcedimento);
        $auth->addChild($medico, $updateProcedimento);
        $auth->addChild($medico, $deleteProcedimento);
        //administrador
         $auth->addChild($admin, $viewAdmin);
        $auth->addChild($admin, $addMedico);
        $auth->addChild($admin, $addPaciente);
        $auth->addChild($admin, $addAtendente);
        
        $auth->addChild($admin, $deleteMedico);
        $auth->addChild($admin, $deletePaciente);
        $auth->addChild($admin, $deleteAtendente);

        $auth->addChild($admin, $viewMedico);
        $auth->addChild($admin, $viewPaciente);
        $auth->addChild($admin, $viewAtendente);

        $auth->addChild($admin, $indexMedico);
        $auth->addChild($admin, $indexPaciente);
        $auth->addChild($admin, $indexAtendente);

        $auth->addChild($admin, $updateMedico);
        $auth->addChild($admin, $updatePaciente);
        $auth->addChild($admin, $updateAtendente);
        $auth->addChild($admin, $atendente); //aqui o adm tem o poder de acessar todas as telas do atendente
        



        $users = Usuario::find()->all();
        foreach ($users as $user) {
            $role = $auth->getRole($user->tipo);
            $auth->assign($role, $user->idUsuario);
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            // return $this->goHome();
            return $this->redirect(["site/index"]);

        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
          if(Yii::$app->user->identity->tipo =="atendente"){

              return $this->redirect(["atendente/index"]);

          }if (Yii::$app->user->identity->tipo == "paciente") {

              return $this->redirect(["paciente/index"]);

          }if(Yii::$app->user->identity->tipo == "administrador") {

            return $this->redirect(["usuario/admin"]);

          } else {
              return $this->redirect(["medico/index"]);
          }
          
            
        }
    

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
}
