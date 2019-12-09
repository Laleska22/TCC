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
 * @property string $CPF
 * @property int $Historico_medico_idHistorico_medico
 * @property int $Usuario_idUsuario
 *
 * @property Consulta[] $consultas
 * @property HistoricoMedico $historicoMedicoIdHistoricoMedico
 * @property Usuario $usuarioIdUsuario
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
            [['Nome', 'DataNascimento', 'RG', 'Cidade', 'Idade', 'Sexo', 'CPF', 'Historico_medico_idHistorico_medico', 'Usuario_idUsuario'], 'required'],
            [['DataNascimento'], 'safe'],
            [['Idade', 'Historico_medico_idHistorico_medico', 'Usuario_idUsuario'], 'integer'],
            [['Sexo'], 'string'],
            [['Nome', 'RG', 'Cidade', 'CPF'], 'string', 'max' => 45],
            [['Historico_medico_idHistorico_medico'], 'exist', 'skipOnError' => true, 'targetClass' => HistoricoMedico::className(), 'targetAttribute' => ['Historico_medico_idHistorico_medico' => 'idHistorico_medico']],
            [['Usuario_idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['Usuario_idUsuario' => 'idUsuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPaciente' => 'Id Paciente',
            'Nome' => 'Nome',
            'DataNascimento' => 'Data Nascimento',
            'RG' => 'Rg',
            'Cidade' => 'Cidade',
            'Idade' => 'Idade',
            'Sexo' => 'Sexo',
            'CPF' => 'Cpf',
            'Historico_medico_idHistorico_medico' => 'Historico Medico Id Historico Medico',
            'Usuario_idUsuario' => 'Usuario Id Usuario',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'Usuario_idUsuario']);
    }

    public static function listAll() {
        return self::find()->orderBy('Nome ASC')->all();
    }
}
