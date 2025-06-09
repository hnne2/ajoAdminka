<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Feedback;

/**
 * FeedbackSearch represents the model behind the search form of `app\models\Feedback`.
 */
class FeedbackSearch extends Feedback
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'tel', 'email', 'prize', 'lottery_id'], 'safe'],
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Feedback::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC // Сначала новые записи
                ]
            ],
            'pagination' => [
                'pageSize' => 20 // Количество элементов на странице
            ]
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // Фильтрация по точному совпадению
        $query->andFilterWhere([
            'id' => $this->id,
            'lottery_id' => $this->lottery_id,
        ]);

        // Фильтрация по дате (если created_at передается)
        if (!empty($this->created_at)) {
            $query->andFilterWhere(['>=', 'created_at', date('Y-m-d 00:00:00', strtotime($this->created_at))])
                ->andFilterWhere(['<=', 'created_at', date('Y-m-d 23:59:59', strtotime($this->created_at))]);
        }

        // Фильтрация по like для текстовых полей
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'prize', $this->prize]);

        return $dataProvider;
    }
}
