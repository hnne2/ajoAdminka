<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class CheckSearch extends Check
{
    public function rules()
    {
        return [
            [['status'], 'safe'],
            // добавь другие поля, если надо (например, uploaded_at и т.д.)
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Check::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 50,
            ],
            'sort' => [
                'defaultOrder' => [
                    'uploaded_at' => SORT_DESC,
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['status' => $this->status]);

        return $dataProvider;
    }
}
?>
