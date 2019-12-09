<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Atendente".
 *
 * @property int $idAtendente
 * @property string $Nome
 * @property string $Sexo
 * @property string $Endereco
 * @property string $DataNasc
 * @property int $Usuario_idUsuario
 *
 * @property Usuario $usuarioIdUsuario
 * @property ClinicaHasAtendente[] $clinicaHasAtendentes
 * @property Clinica[] $clinicaIdClinicas
 */
class Atendente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Atendente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'Sexo', 'Endereco', 'DataNasc', 'Usuario_idUsuario'], 'required'],
            [['Sexo'], 'string'],
            [['DataNasc'], 'safe'],
            [['Usuario_idUsuario'], 'integer'],
            [['Nome'], 'string', 'max' => 45],
            [['Endereco'], 'string', 'max' => 60],
            [['Usuario_idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['Usuario_idUsuario' => 'idUsuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idAtendente' => 'Id Atendente',
            'Nome' => 'Nome',
            'Sexo' => 'Sexo',
            'Endereco' => 'Endereco',
            'DataNasc' => 'Data Nasc',
            'Usuario_idUsuario' => 'Usuario Id Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'Usuario_idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClinicaHasAtendentes()
    {
        return $this->hasMany(ClinicaHasAtendente::className(), ['Atendente_idAtendente' => 'idAtendente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClinicaIdClinicas()
    {
        return $this->hasMany(Clinica::className(), ['idClinica' => 'Clinica_idClinica', 'Agenda_idAgenda' => 'Clinica_Agenda_idAgenda'])->viaTable('Clinica_has_Atendente', ['Atendente_idAtendente' => 'idAtendente']);
    }
}
