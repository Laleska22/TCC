<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Procedimentos".
 *
 * @property int $idProcedimentos
 * @property string $Nome_procedimento
 *
 * @property Exame[] $exames
 * @property Consulta[] $consultaIdConsultas
 */
class Procedimentos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Procedimentos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome_procedimento'], 'required'],
            [['Nome_procedimento'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProcedimentos' => Yii::t('app', 'Id Procedimentos'),
            'Nome_procedimento' => Yii::t('app', 'Nome Procedimento'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExames()
    {
        return $this->hasMany(Exame::className(), ['Procedimentos_idProcedimentos' => 'idProcedimentos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultaIdConsultas()
    {
        return $this->hasMany(Consulta::className(), ['idConsulta' => 'Consulta_idConsulta'])->viaTable('Exame', ['Procedimentos_idProcedimentos' => 'idProcedimentos']);
    }
}
