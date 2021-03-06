<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Overview;

/**
 * OverviewSearch represents the model behind the search form of `app\models\Overview`.
 */
class OverviewSearch extends Overview
{
    public $projectName;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'paragraph', 'extra', 'projectName'], 'safe'],
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
        $query = Overview::find();

        $query->with("project");

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
            'id' => $this->id
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'paragraph', $this->paragraph])
            ->andFilterWhere(['like', 'extra', $this->extra]);

        $query->joinWith(['project'=>function ($q) {
            $q->where('project.name LIKE "%' .
                $this->projectName . '%"');
        }]);

        return $dataProvider;
    }
}
