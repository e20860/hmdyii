<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Images;

/**
 * ImagesSearch represents the model behind the search form of `app\modules\admin\models\Images`.
 */
class ImagesSearch extends Images
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'prod_id', 'ord'], 'integer'],
            [['file'], 'safe'],
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
        $query = Images::find();

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
            'prod_id' => $this->prod_id,
            'ord' => $this->ord,
        ]);

        $query->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
