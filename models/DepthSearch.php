<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Depth;

/**
 * DepthSearch represents the model behind the search form of `app\models\Depth`.
 */
class DepthSearch extends Depth
{
    /**
     * {@inheritdoc}
     */

    public $horizontalName;
    public $viewName;

    public function rules()
    {
        return [
            [['name', 'horizontalName', 'viewName'], 'safe'],
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
        $query = Depth::find();
        $query->with(['horizontal', 'view']);

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

        $query->andFilterWhere(['like', 'name', $this->name]);

        $query->joinWith(['horizontal'=>function ($q) {
            $q->where('horizontal.name LIKE "%' .
                $this->horizontalName . '%"');
        }]);

        $query->joinWith(['view'=>function ($q) {
            $q->where('background_view.name LIKE "%' .
                $this->viewName . '%"');
        }]);

        return $dataProvider;
    }
}
