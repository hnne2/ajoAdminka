<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class VapeSearch extends Vape
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['sort', 'flavor_list', 'image_path'], 'safe'],
            [['sweetness', 'ice_level', 'sourness'], 'number'],
            [['is_top15', 'isActive'], 'boolean'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios(); // обходим родительскую реализацию
    }

    public function search($params)
{
    $query = Vape::find();

    $dataProvider = new ActiveDataProvider([
        'query' => $query,
    ]);

    $this->load($params);

    if (!$this->validate()) {
        return $dataProvider;
    }

    $query->andFilterWhere([
        'id' => $this->id,
        'sweetness' => $this->sweetness,
        'ice_level' => $this->ice_level,
        'sourness' => $this->sourness,
    ]);

    $query->andFilterWhere(['like', 'sort', $this->sort])
          ->andFilterWhere(['like', 'flavor_list', $this->flavor_list]);

    // Фильтрация по is_top15 — только если фильтр не пустой
    if ($this->is_top15 !== '' && $this->is_top15 !== null) {
        $query->andWhere(['is_top15' => $this->is_top15]);
    }

    // Фильтрация по isActive — только если фильтр не пустой
    if ($this->isActive !== '' && $this->isActive !== null) {
        $query->andWhere(['isActive' => $this->isActive]);
    }

    return $dataProvider;
}

}
