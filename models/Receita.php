<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Receita".
 *
 * @property int $idReceita
 * @property string $Medicamento
 * @property string $Qtd_Medicamento
 * @property string $Forma_de_Tomar
 * @property string $Data_Emissão
 * @property int $Consulta_idConsulta
 *
 * @property Consulta $consultaIdConsulta
 */
class Receita extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Receita';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Medicamento', 'Qtd_Medicamento', 'Forma_de_Tomar', 'Data_Emissão', 'Consulta_idConsulta'], 'required'],
            [['Data_Emissão'], 'safe'],
            [['Consulta_idConsulta'], 'integer'],
            [['Medicamento', 'Qtd_Medicamento', 'Forma_de_Tomar'], 'string', 'max' => 200],
            [['Consulta_idConsulta'], 'exist', 'skipOnError' => true, 'targetClass' => Consulta::className(), 'targetAttribute' => ['Consulta_idConsulta' => 'idConsulta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idReceita' => Yii::t('app', 'Id Receita'),
            'Medicamento' => Yii::t('app', 'Medicamento'),
            'Qtd_Medicamento' => Yii::t('app', 'Qtd Medicamento'),
            'Forma_de_Tomar' => Yii::t('app', 'Forma De Tomar'),
            'Data_Emissão' => Yii::t('app', 'Data Emissão'),
            'Consulta_idConsulta' => Yii::t('app', 'Consulta Id Consulta'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultaIdConsulta()
    {
        return $this->hasOne(Consulta::className(), ['idConsulta' => 'Consulta_idConsulta']);
    }
}
