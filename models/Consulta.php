<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Consulta".
 *
 * @property int $idConsulta
 * @property int $Paciente_idPaciente
 * @property int $Medico_idMedico
 * @property string $Data_Consulta
 * @property string $Hora_Consulta
 * @property string $Diagnostico
 * @property string $Tipo_Consulta
 * @property string $Atestado
 *
 * @property Medico $medicoIdMedico
 * @property Paciente $pacienteIdPaciente
 * @property Exame[] $exames
 * @property Procedimentos[] $procedimentosIdProcedimentos
 * @property Receita[] $receitas
 */
class Consulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Consulta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Paciente_idPaciente', 'Medico_idMedico', 'Data_Consulta', 'Hora_Consulta', 'Diagnostico', 'Tipo_Consulta'], 'required'],
            [['Paciente_idPaciente', 'Medico_idMedico'], 'integer'],
            [['Data_Consulta', 'Hora_Consulta'], 'safe'],
            [['Diagnostico'], 'string'],
            [['Tipo_Consulta'], 'string', 'max' => 45],
            [['Atestado'], 'string', 'max' => 200],
            [['Medico_idMedico'], 'exist', 'skipOnError' => true, 'targetClass' => Medico::className(), 'targetAttribute' => ['Medico_idMedico' => 'idMedico']],
            [['Paciente_idPaciente'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['Paciente_idPaciente' => 'idPaciente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idConsulta' => Yii::t('app', 'Id Consulta'),
            'Paciente_idPaciente' => Yii::t('app', 'Paciente Id Paciente'),
            'Medico_idMedico' => Yii::t('app', 'Medico Id Medico'),
            'Data_Consulta' => Yii::t('app', 'Data Consulta'),
            'Hora_Consulta' => Yii::t('app', 'Hora Consulta'),
            'Diagnostico' => Yii::t('app', 'Diagnostico'),
            'Tipo_Consulta' => Yii::t('app', 'Tipo Consulta'),
            'Atestado' => Yii::t('app', 'Atestado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicoIdMedico()
    {
        return $this->hasOne(Medico::className(), ['idMedico' => 'Medico_idMedico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPacienteIdPaciente()
    {
        return $this->hasOne(Paciente::className(), ['idPaciente' => 'Paciente_idPaciente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExames()
    {
        return $this->hasMany(Exame::className(), ['Consulta_idConsulta' => 'idConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcedimentosIdProcedimentos()
    {
        return $this->hasMany(Procedimentos::className(), ['idProcedimentos' => 'Procedimentos_idProcedimentos'])->viaTable('Exame', ['Consulta_idConsulta' => 'idConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceitas()
    {
        return $this->hasMany(Receita::className(), ['Consulta_idConsulta' => 'idConsulta']);
    }
    public function listaConsultasDia($data){ 
        return $query=(new \yii\db\Query())->select(['Consulta.Hora_Consulta','Paciente.Nome', 'Medico.Especialidade','Nome_Medico'])->from('Consulta')->where("Data_Consulta = '$data'")->join('INNER JOIN','Paciente','idPaciente = Paciente_idPaciente')->join('INNER JOIN','Medico','idMedico = Medico_idMedico')->all();
    }
}
