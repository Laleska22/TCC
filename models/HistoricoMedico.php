<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Historico_medico".
 *
 * @property int $idHistorico_medico
 * @property int $Problema_fisico
 * @property string $Descricao_problema_fisico
 * @property int $Doencas_cronicas
 * @property string $Descricao_doencas_cronicas
 * @property string $Pressao_arterial
 * @property int $Toma_medicamento
 * @property string $Descricao_medicamento
 * @property string $Vicios
 * @property int $Cirurgias_submetidas
 * @property string $Descricao_cirurgias
 * @property string $Alimentacao
 * @property string $Funcionamento_do_intestino
 * @property int $Bebe_agua_regularmente
 * @property int $AlergiaMedicamento
 * @property string $Descricao_alergia_medicamento
 *
 * @property Paciente[] $pacientes
 */
class HistoricoMedico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Historico_medico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Problema_fisico', 'Doencas_cronicas', 'Toma_medicamento', 'Cirurgias_submetidas', 'Bebe_agua_regularmente', 'AlergiaMedicamento'], 'integer'],
            [['Pressao_arterial', 'Alimentacao', 'Funcionamento_do_intestino'], 'string'],
            [['Descricao_problema_fisico', 'Descricao_doencas_cronicas', 'Descricao_medicamento', 'Vicios', 'Descricao_cirurgias', 'Descricao_alergia_medicamento'], 'string', 'max' => 400],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idHistorico_medico' => Yii::t('app', 'Id Historico Medico'),
            'Problema_fisico' => Yii::t('app', 'Problema Fisico'),
            'Descricao_problema_fisico' => Yii::t('app', 'Descricao Problema Fisico'),
            'Doencas_cronicas' => Yii::t('app', 'Doencas Cronicas'),
            'Descricao_doencas_cronicas' => Yii::t('app', 'Descricao Doencas Cronicas'),
            'Pressao_arterial' => Yii::t('app', 'Pressao Arterial'),
            'Toma_medicamento' => Yii::t('app', 'Toma Medicamento'),
            'Descricao_medicamento' => Yii::t('app', 'Descricao Medicamento'),
            'Vicios' => Yii::t('app', 'Vicios'),
            'Cirurgias_submetidas' => Yii::t('app', 'Cirurgias Submetidas'),
            'Descricao_cirurgias' => Yii::t('app', 'Descricao Cirurgias'),
            'Alimentacao' => Yii::t('app', 'Alimentacao'),
            'Funcionamento_do_intestino' => Yii::t('app', 'Funcionamento Do Intestino'),
            'Bebe_agua_regularmente' => Yii::t('app', 'Bebe Agua Regularmente'),
            'AlergiaMedicamento' => Yii::t('app', 'Alergia Medicamento'),
            'Descricao_alergia_medicamento' => Yii::t('app', 'Descricao Alergia Medicamento'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPacientes()
    {
        return $this->hasMany(Paciente::className(), ['Historico_medico_idHistorico_medico' => 'idHistorico_medico']);
    }
}
