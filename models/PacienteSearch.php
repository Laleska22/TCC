<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Paciente;

/**
 * PacienteSearch represents the model behind the search form of `app\models\Paciente`.
 */
class PacienteSearch extends Paciente
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPaciente', 'Idade', 'Historico_medico_idHistorico_medico'], 'integer'],
            [['Nome', 'DataNascimento', 'RG', 'Cidade', 'Sexo', 'CPF', 'Senha'], 'safe'],
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
        $query = Paciente::find();

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
            'idPaciente' => $this->idPaciente,
            'DataNascimento' => $this->DataNascimento,
            'Idade' => $this->Idade,
            'Historico_medico_idHistorico_medico' => $this->Historico_medico_idHistorico_medico,
        ]);

        $query->andFilterWhere(['like', 'Nome', $this->Nome])
            ->andFilterWhere(['like', 'RG', $this->RG])
            ->andFilterWhere(['like', 'Cidade', $this->Cidade])
            ->andFilterWhere(['like', 'Sexo', $this->Sexo])
            // ->andFilterWhere(['like', 'Imagem', $this->Imagem])
            ->andFilterWhere(['like', 'CPF', $this->CPF]);
            // ->andFilterWhere(['like', 'Senha', $this->Senha]);

        return $dataProvider;
    }
}
