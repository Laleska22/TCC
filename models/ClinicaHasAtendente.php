<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Clinica_has_Atendente".
 *
 * @property int $Clinica_idClinica
 * @property int $Clinica_Agenda_idAgenda
 * @property int $Atendente_idAtendente
 *
 * @property Clinica $clinicaIdClinica
 * @property Atendente $atendenteIdAtendente
 */
class ClinicaHasAtendente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Clinica_has_Atendente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Clinica_idClinica', 'Clinica_Agenda_idAgenda', 'Atendente_idAtendente'], 'required'],
            [['Clinica_idClinica', 'Clinica_Agenda_idAgenda', 'Atendente_idAtendente'], 'integer'],
            [['Clinica_idClinica', 'Clinica_Agenda_idAgenda', 'Atendente_idAtendente'], 'unique', 'targetAttribute' => ['Clinica_idClinica', 'Clinica_Agenda_idAgenda', 'Atendente_idAtendente']],
            [['Clinica_idClinica', 'Clinica_Agenda_idAgenda'], 'exist', 'skipOnError' => true, 'targetClass' => Clinica::className(), 'targetAttribute' => ['Clinica_idClinica' => 'idClinica', 'Clinica_Agenda_idAgenda' => 'Agenda_idAgenda']],
            [['Atendente_idAtendente'], 'exist', 'skipOnError' => true, 'targetClass' => Atendente::className(), 'targetAttribute' => ['Atendente_idAtendente' => 'idAtendente']],
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
            'Atendente_idAtendente' => Yii::t('app', 'Atendente Id Atendente'),
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
    public function getAtendenteIdAtendente()
    {
        return $this->hasOne(Atendente::className(), ['idAtendente' => 'Atendente_idAtendente']);
    }
}
