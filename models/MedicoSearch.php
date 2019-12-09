<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Medico;

/**
 * MedicoSearch represents the model behind the search form of `app\models\Medico`.
 */
class MedicoSearch extends Medico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idMedico'], 'integer'],
            [['CRM', 'Nome_Medico', 'Especialidade', 'Telefone', 'CPF', 'Senha'], 'safe'],
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
        $query = Medico::find();

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
            'idMedico' => $this->idMedico,
        ]);

        $query->andFilterWhere(['like', 'CRM', $this->CRM])
            ->andFilterWhere(['like', 'Nome_Medico', $this->Nome_Medico])
            ->andFilterWhere(['like', 'Especialidade', $this->Especialidade])
            ->andFilterWhere(['like', 'Telefone', $this->Telefone])
            ->andFilterWhere(['like', 'CPF', $this->CPF]);
            // ->andFilterWhere(['like', 'Senha', $this->Senha]);

        return $dataProvider;
    }
}
