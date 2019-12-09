<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clinica;

/**
 * ClinicaSearch represents the model behind the search form of `app\models\Clinica`.
 */
class ClinicaSearch extends Clinica
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idClinica', 'CEP', 'Agenda_idAgenda'], 'integer'],
            [['Nome', 'CNPJ', 'Telefone', 'Especialidade', 'Endereco', 'LogoMarca', 'Email_Clinica', 'UF'], 'safe'],
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
        $query = Clinica::find();

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
            'idClinica' => $this->idClinica,
            'CEP' => $this->CEP,
            'Agenda_idAgenda' => $this->Agenda_idAgenda,
        ]);

        $query->andFilterWhere(['like', 'Nome', $this->Nome])
            ->andFilterWhere(['like', 'CNPJ', $this->CNPJ])
            ->andFilterWhere(['like', 'Telefone', $this->Telefone])
            ->andFilterWhere(['like', 'Especialidade', $this->Especialidade])
            ->andFilterWhere(['like', 'Endereco', $this->Endereco])
            ->andFilterWhere(['like', 'LogoMarca', $this->LogoMarca])
            ->andFilterWhere(['like', 'Email_Clinica', $this->Email_Clinica])
            ->andFilterWhere(['like', 'UF', $this->UF]);

        return $dataProvider;
    }
}
