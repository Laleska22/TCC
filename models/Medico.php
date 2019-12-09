<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Medico".
 *
 * @property int $idMedico
 * @property string $CRM
 * @property string $Nome_Medico
 * @property string $Especialidade
 * @property string $Telefone
 * @property resource $Imagem
 * @property string $CPF
 * @property int $Usuario_idUsuario
 *
 * @property Agenda[] $agendas
 * @property Consulta[] $consultas
 * @property Usuario $usuarioIdUsuario
 */
class Medico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Medico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CRM', 'Nome_Medico', 'Especialidade', 'Telefone', 'CPF', 'Usuario_idUsuario'], 'required'],
            [['Imagem'], 'string'],
            [['Usuario_idUsuario'], 'integer'],
            [['CRM', 'Nome_Medico', 'Especialidade', 'Telefone', 'CPF'], 'string', 'max' => 45],
            [['CRM'], 'unique'],
            [['Usuario_idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['Usuario_idUsuario' => 'idUsuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idMedico' => 'Id Medico',
            'CRM' => 'Crm',
            'Nome_Medico' => 'Nome Medico',
            'Especialidade' => 'Especialidade',
            'Telefone' => 'Telefone',
            'Imagem' => 'Imagem',
            'CPF' => 'Cpf',
            'Usuario_idUsuario' => 'Usuario Id Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendas()
    {
        return $this->hasMany(Agenda::className(), ['Medico_idMedico' => 'idMedico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::className(), ['Medico_idMedico' => 'idMedico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'Usuario_idUsuario']);
    }
    public static function listAll() {
        return self::find()->orderBy('Nome_Medico ASC')->all();
    }
}
