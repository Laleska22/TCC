<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Medico".
 *
 * @property int $idMedico
 * @property string $CRM
 * @property string $Nome
 * @property string $Especialidade
 * @property string $Telefone
 * @property resource $Imagem
 * @property string $CPF
 * @property string $Senha
 *
 * @property Agenda[] $agendas
 * @property Consulta[] $consultas
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
            [['CRM', 'Nome', 'Especialidade', 'Telefone', 'CPF', 'Senha'], 'required'],
            [['Imagem'], 'string'],
            [['CRM', 'Nome', 'Especialidade', 'Telefone', 'CPF', 'Senha'], 'string', 'max' => 45],
            [['CRM'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idMedico' => Yii::t('app', 'Id Medico'),
            'CRM' => Yii::t('app', 'Crm'),
            'Nome' => Yii::t('app', 'Nome'),
            'Especialidade' => Yii::t('app', 'Especialidade'),
            'Telefone' => Yii::t('app', 'Telefone'),
            'Imagem' => Yii::t('app', 'Imagem'),
            'CPF' => Yii::t('app', 'Cpf'),
            'Senha' => Yii::t('app', 'Senha'),
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
}
