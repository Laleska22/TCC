<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Paciente".
 *
 * @property int $idPaciente
 * @property string $Nome
 * @property string $DataNascimento
 * @property string $RG
 * @property string $Cidade
 * @property int $Idade
 * @property string $Sexo
 * @property resource $Imagem
 * @property string $CPF
 * @property string $Senha
 * @property int $Historico_medico_idHistorico_medico
 *
 * @property Consulta[] $consultas
 * @property HistoricoMedico $historicoMedicoIdHistoricoMedico
 */
class Paciente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Paciente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'DataNascimento', 'RG', 'Cidade', 'Idade', 'Sexo', 'CPF', 'Senha', 'Historico_medico_idHistorico_medico'], 'required'],
            [['DataNascimento'], 'safe'],
            [['Idade', 'Historico_medico_idHistorico_medico'], 'integer'],
            [['Sexo', 'Imagem'], 'string'],
            [['Nome', 'RG', 'Cidade', 'CPF', 'Senha'], 'string', 'max' => 45],
            [['Historico_medico_idHistorico_medico'], 'exist', 'skipOnError' => true, 'targetClass' => HistoricoMedico::className(), 'targetAttribute' => ['Historico_medico_idHistorico_medico' => 'idHistorico_medico']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPaciente' => Yii::t('app', 'Id Paciente'),
            'Nome' => Yii::t('app', 'Nome'),
            'DataNascimento' => Yii::t('app', 'Data Nascimento'),
            'RG' => Yii::t('app', 'Rg'),
            'Cidade' => Yii::t('app', 'Cidade'),
            'Idade' => Yii::t('app', 'Idade'),
            'Sexo' => Yii::t('app', 'Sexo'),
            'Imagem' => Yii::t('app', 'Imagem'),
            'CPF' => Yii::t('app', 'Cpf'),
            'Senha' => Yii::t('app', 'Senha'),
            'Historico_medico_idHistorico_medico' => Yii::t('app', 'Historico Medico Id Historico Medico'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::className(), ['Paciente_idPaciente' => 'idPaciente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistoricoMedicoIdHistoricoMedico()
    {
        return $this->hasOne(HistoricoMedico::className(), ['idHistorico_medico' => 'Historico_medico_idHistorico_medico']);
    }
}
