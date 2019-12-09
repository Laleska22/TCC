<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Atendente;

/**
 * AtendenteSearch represents the model behind the search form of `app\models\Atendente`.
 */
class AtendenteSearch extends Atendente
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idAtendente'], 'integer'],
            [['Nome', 'Sexo', 'Endereco', 'DataNasc', 'authKey', 'acess_Token'], 'safe'],
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
        $query = Atendente::find();

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
            'idAtendente' => $this->idAtendente,
            'DataNasc' => $this->DataNasc,
        ]);

        $query->andFilterWhere(['like', 'Nome', $this->Nome])
            ->andFilterWhere(['like', 'Sexo', $this->Sexo])
            ->andFilterWhere(['like', 'Endereco', $this->Endereco]);
            // ->andFilterWhere(['like', 'authKey', $this->authKey])
            // ->andFilterWhere(['like', 'acess_Token', $this->acess_Token]);

        return $dataProvider;
    }
}