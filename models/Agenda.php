<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Agenda".
 *
 * @property int $idAgenda
 * @property string $Dia_Da_Semana
 * @property string $Horario_Atendimento
 * @property int $Medico_idMedico
 *
 * @property Medico $medicoIdMedico
 * @property Clinica[] $clinicas
 */
class Agenda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Agenda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Dia_Da_Semana', 'Horario_Atendimento', 'Medico_idMedico'], 'required'],
            [['Dia_Da_Semana'], 'string'],
            [['Medico_idMedico'], 'integer'],
            [['Horario_Atendimento'], 'string', 'max' => 45],
            [['Medico_idMedico'], 'exist', 'skipOnError' => true, 'targetClass' => Medico::className(), 'targetAttribute' => ['Medico_idMedico' => 'idMedico']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idAgenda' => Yii::t('app', 'Id Agenda'),
            'Dia_Da_Semana' => Yii::t('app', 'Dia Da Semana'),
            'Horario_Atendimento' => Yii::t('app', 'Horario Atendimento'),
            'Medico_idMedico' => Yii::t('app', 'Medico Id Medico'),
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
    public function getClinicas()
    {
        return $this->hasMany(Clinica::className(), ['Agenda_idAgenda' => 'idAgenda']);
    }
}
