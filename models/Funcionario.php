<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Funcionario".
 *
 * @property int $idFuncionario
 * @property string $Nome
 * @property string $Sexo
 * @property string $Endereco
 * @property string $DataNasc
 *
 * @property ClinicaHasFuncionario[] $clinicaHasFuncionarios
 * @property Clinica[] $clinicaIdClinicas
 */
class Funcionario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Funcionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'Sexo', 'Endereco', 'DataNasc'], 'required'],
            [['Sexo'], 'string'],
            [['DataNasc'], 'safe'],
            [['Nome'], 'string', 'max' => 45],
            [['Endereco'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idFuncionario' => Yii::t('app', 'Id Funcionario'),
            'Nome' => Yii::t('app', 'Nome'),
            'Sexo' => Yii::t('app', 'Sexo'),
            'Endereco' => Yii::t('app', 'Endereco'),
            'DataNasc' => Yii::t('app', 'Data Nasc'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClinicaHasFuncionarios()
    {
        return $this->hasMany(ClinicaHasFuncionario::className(), ['Funcionario_idFuncionario' => 'idFuncionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClinicaIdClinicas()
    {
        return $this->hasMany(Clinica::className(), ['idClinica' => 'Clinica_idClinica', 'Agenda_idAgenda' => 'Clinica_Agenda_idAgenda'])->viaTable('Clinica_has_Funcionario', ['Funcionario_idFuncionario' => 'idFuncionario']);
    }
}
