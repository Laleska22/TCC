<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Clinica".
 *
 * @property int $idClinica
 * @property string $Nome
 * @property string $CNPJ
 * @property string $Telefone
 * @property string $Especialidade
 * @property string $Endereco
 * @property resource $LogoMarca
 * @property string $Email_Clinica
 * @property string $UF
 * @property int $CEP
 * @property int $Agenda_idAgenda
 *
 * @property Agenda $agendaIdAgenda
 * @property ClinicaHasFuncionario[] $clinicaHasFuncionarios
 * @property Funcionario[] $funcionarioIdFuncionarios
 */
class Clinica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Clinica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'CNPJ', 'Telefone', 'Especialidade', 'Endereco', 'UF', 'CEP', 'Agenda_idAgenda'], 'required'],
            [['LogoMarca'], 'string'],
            [['CEP', 'Agenda_idAgenda'], 'integer'],
            [['Nome', 'Telefone', 'Especialidade', 'Endereco'], 'string', 'max' => 45],
            [['CNPJ'], 'string', 'max' => 18],
            [['Email_Clinica'], 'string', 'max' => 30],
            [['UF'], 'string', 'max' => 2],
            [['Agenda_idAgenda'], 'exist', 'skipOnError' => true, 'targetClass' => Agenda::className(), 'targetAttribute' => ['Agenda_idAgenda' => 'idAgenda']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idClinica' => Yii::t('app', 'Id Clinica'),
            'Nome' => Yii::t('app', 'Nome'),
            'CNPJ' => Yii::t('app', 'Cnpj'),
            'Telefone' => Yii::t('app', 'Telefone'),
            'Especialidade' => Yii::t('app', 'Especialidade'),
            'Endereco' => Yii::t('app', 'Endereco'),
            'LogoMarca' => Yii::t('app', 'Logo Marca'),
            'Email_Clinica' => Yii::t('app', 'Email Clinica'),
            'UF' => Yii::t('app', 'Uf'),
            'CEP' => Yii::t('app', 'Cep'),
            'Agenda_idAgenda' => Yii::t('app', 'Agenda Id Agenda'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaIdAgenda()
    {
        return $this->hasOne(Agenda::className(), ['idAgenda' => 'Agenda_idAgenda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClinicaHasFuncionarios()
    {
        return $this->hasMany(ClinicaHasFuncionario::className(), ['Clinica_idClinica' => 'idClinica', 'Clinica_Agenda_idAgenda' => 'Agenda_idAgenda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarioIdFuncionarios()
    {
        return $this->hasMany(Funcionario::className(), ['idFuncionario' => 'Funcionario_idFuncionario'])->viaTable('Clinica_has_Funcionario', ['Clinica_idClinica' => 'idClinica', 'Clinica_Agenda_idAgenda' => 'Agenda_idAgenda']);
    }
}
