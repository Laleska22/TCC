<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "Usuario".
 *
 * @property int $idUsuario
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 *
 * @property Atendente[] $atendentes
 * @property Medico[] $medicos
 * @property Paciente[] $pacientes
 */
class Usuario extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password','tipo'], 'required'],
            [['tipo'],'string'],
            [['username', 'password', 'authKey', 'accessToken'], 'string', 'max' => 150],
        ];
    }

    //keylly fez isso para autorização

    public function afterSave($insert , $changingAttributes) {
        $auth = Yii::$app->authManager;

        if ($insert) {
            $role = $auth->getRole($this->tipo);
            $auth->assign($role, $this->idUsuario);
        } else {
            if (isset($changingAttributes['tipo'])) {
                $auth->revokeAll($this->idUsuario);
                $role = $auth->getRole($this->tipo);
                $auth->assign($role, $this->idUsuario);
            }
        }
        
        
    }

    public function afterDelete() {
        $auth = Yii::$app->authManager;
        $auth->revokeAll($this->idUsuario);
    }

    //fim 

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => Yii::t('app', 'Id Usuario'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'authKey' => Yii::t('app', 'Auth Key'),
            'accessToken' => Yii::t('app', 'Access Token'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtendentes()
    {
        return $this->hasMany(Atendente::className(), ['Usuario_idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicos()
    {
        return $this->hasMany(Medico::className(), ['Usuario_idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPacientes()
    {
        return $this->hasMany(Paciente::className(), ['Usuario_idUsuario' => 'idUsuario']);
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->authKey = \Yii::$app->security->generateRandomString();
                $this->accessToken = \Yii::$app->security->generateRandomString();
                $this->password = sha1( $this -> password );
            }

            // if ( isset ( $this -> dirtyAttributes [ ' senha ' ]))
            //     $this -> password  =  sha1 ( $this -> password );
            return true;
        }
        return false;
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->idUsuario;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
    public static function findByUsername($username)
    {
        return static::findOne(['username'=>$username]);
        
    }
    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }

    
}
