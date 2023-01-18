<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `app\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'unit_price', 'selling_price', 'quantity', 'active', 'stock'], 'integer'],
            [['user_email', 'name', 'description', 'ikey', 'availability', 'brand', 'image', 'created_at', 'amount'], 'safe'],
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
        $query = Products::find();

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
            'unit_price' => $this->unit_price,
            'selling_price' => $this->selling_price,
            'quantity' => $this->quantity,
            'active' => $this->active,
            'stock' => $this->stock,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'user_email', $this->user_email])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'ikey', $this->ikey])
            ->andFilterWhere(['like', 'availability', $this->availability])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'amount', $this->amount]);

        return $dataProvider;
    }
}
