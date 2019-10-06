<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Clinica_has_Funcionario".
 *
 * @property int $Clinica_idClinica
 * @property int $Clinica_Agenda_idAgenda
 * @property int $Funcionario_idFuncionario
 *
 * @property Clinica $clinicaIdClinica
 * @property Funcionario $funcionarioIdFuncionario
 */
class ClinicaHasFuncionario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Clinica_has_Funcionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Clinica_idClinica', 'Clinica_Agenda_idAgenda', 'Funcionario_idFuncionario'], 'required'],
            [['Clinica_idClinica', 'Clinica_Agenda_idAgenda', 'Funcionario_idFuncionario'], 'integer'],
            [['Clinica_idClinica', 'Clinica_Agenda_idAgenda', 'Funcionario_idFuncionario'], 'unique', 'targetAttribute' => ['Clinica_idClinica', 'Clinica_Agenda_idAgenda', 'Funcionario_idFuncionario']],
            [['Clinica_idClinica', 'Clinica_Agenda_idAgenda'], 'exist', 'skipOnError' => true, 'targetClass' => Clinica::className(), 'targetAttribute' => ['Clinica_idClinica' => 'idClinica', 'Clinica_Agenda_idAgenda' => 'Agenda_idAgenda']],
            [['Funcionario_idFuncionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['Funcionario_idFuncionario' => 'idFuncionario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Clinica_idClinica' => Yii::t('app', 'Clinica Id Clinica'),
            'Clinica_Agenda_idAgenda' => Yii::t('app', 'Clinica Agenda Id Agenda'),
            'Funcionario_idFuncionario' => Yii::t('app', 'Funcionario Id Funcionario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClinicaIdClinica()
    {
        return $this->hasOne(Clinica::className(), ['idClinica' => 'Clinica_idClinica', 'Agenda_idAgenda' => 'Clinica_Agenda_idAgenda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarioIdFuncionario()
    {
        return $this->hasOne(Funcionario::className(), ['idFuncionario' => 'Funcionario_idFuncionario']);
    }
}
