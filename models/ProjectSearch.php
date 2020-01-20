<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Project;

/**
 * ProjectSearch represents the model behind the search form of `app\models\Project`.
 */
class ProjectSearch extends Project
{
    public $sort;

    public function rules()
    {
        return [
            [['name', 'description', 'overview', 'date_from', 'date_to', 'sort', 'extra'], 'safe'],
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
        $query = Project::find();

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
            'id' => $this->id,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'overview', $this->overview]);

        if(!empty($this->extra)) {
            if(count($this->extra) == 1) {
                $query->andFilterWhere(['extra' => $this->extra]);
            }
            if(count($this->extra) > 1) {
                foreach ($this->extra as $ext) {
                    $query->orFilterWhere(['extra' => $ext]);
                }
            }
        }
        //var_dump($this->extra);

        if(!empty($this->sort)) {
            if($this->sort == 1) {
                $query->orderBy([
                    'date_to' => SORT_DESC
                ]);
            } else if($this->sort == 2) {
                $query->orderBy([
                    'date_to' => SORT_ASC
                ]);
            } else if($this->sort == 3) {
                $query->orderBy([
                    'name' => SORT_DESC
                ]);
            } else if($this->sort == 4) {
                $query->orderBy([
                    'name' => SORT_ASC
                ]);
            }
        }


        return $dataProvider;
    }
}
