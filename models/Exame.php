<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Exame".
 *
 * @property int $Consulta_idConsulta
 * @property int $Procedimentos_idProcedimentos
 *
 * @property Consulta $consultaIdConsulta
 * @property Procedimentos $procedimentosIdProcedimentos
 */
class Exame extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Exame';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Consulta_idConsulta', 'Procedimentos_idProcedimentos'], 'required'],
            [['Consulta_idConsulta', 'Procedimentos_idProcedimentos'], 'integer'],
            [['Consulta_idConsulta', 'Procedimentos_idProcedimentos'], 'unique', 'targetAttribute' => ['Consulta_idConsulta', 'Procedimentos_idProcedimentos']],
            [['Consulta_idConsulta'], 'exist', 'skipOnError' => true, 'targetClass' => Consulta::className(), 'targetAttribute' => ['Consulta_idConsulta' => 'idConsulta']],
            [['Procedimentos_idProcedimentos'], 'exist', 'skipOnError' => true, 'targetClass' => Procedimentos::className(), 'targetAttribute' => ['Procedimentos_idProcedimentos' => 'idProcedimentos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Consulta_idConsulta' => Yii::t('app', 'Consulta Id Consulta'),
            'Procedimentos_idProcedimentos' => Yii::t('app', 'Procedimentos Id Procedimentos'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultaIdConsulta()
    {
        return $this->hasOne(Consulta::className(), ['idConsulta' => 'Consulta_idConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcedimentosIdProcedimentos()
    {
        return $this->hasOne(Procedimentos::className(), ['idProcedimentos' => 'Procedimentos_idProcedimentos']);
    }
}
