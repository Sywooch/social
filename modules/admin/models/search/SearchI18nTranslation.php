<?php

namespace app\modules\admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\I18nTranslation;

/**
 * SearchI18nTranslation represents the model behind the search form about `app\models\I18nTranslation`.
 */
class SearchI18nTranslation extends I18nTranslation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sourceId'], 'integer'],
            [['language', 'message'], 'safe'],
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
        $query = I18nTranslation::find();

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
            'sourceId' => $this->sourceId,
        ]);
        $query->orderBy('sourceId desc');
        $query->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}
