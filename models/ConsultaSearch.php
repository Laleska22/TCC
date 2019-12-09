<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Consulta;

/**
 * ConsultaSearch represents the model behind the search form of `app\models\Consulta`.
 */
class ConsultaSearch extends Consulta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idConsulta', 'Paciente_idPaciente', 'Medico_idMedico'], 'integer'],
            [['Data_Consulta', 'Hora_Consulta', 'Diagnostico', 'Tipo_Consulta', 'Atestado'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Consulta::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idConsulta' => $this->idConsulta,
            'Paciente_idPaciente' => $this->Paciente_idPaciente,
            'Medico_idMedico' => $this->Medico_idMedico,
            'Data_Consulta' => $this->Data_Consulta,
            'Hora_Consulta' => $this->Hora_Consulta,
        ]);

        $query->andFilterWhere(['like', 'Diagnostico', $this->Diagnostico])
            ->andFilterWhere(['like', 'Tipo_Consulta', $this->Tipo_Consulta])
            ->andFilterWhere(['like', 'Atestado', $this->Atestado]);

        return $dataProvider;
    }
}
