<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Person;

/**
 * PersonSearch represents the model behind the search form about `app\models\Person`.
 */
class PersonSearch extends Person
{
    public $user_email;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id'], 'integer'],
            [['full_name', 'rg', 'postalcode', 'state', 'city', 'neighborhood', 'streetname', 'number', 'complement', 'phone', 'created_at', 'user_email'], 'safe'],
            [['survey_success'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Person::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->joinWith(['users']);
        
        $dataProvider->sort->attributes['user_email'] = [
            'asc' => ['user.email' => SORT_ASC],
            'desc' => ['user.email' => SORT_DESC],
        ];
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'person_id' => $this->person_id,
            'survey_success' => $this->survey_success,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'user.email', $this->user_email]);

        return $dataProvider;
    }
}
