<?php

namespace app\modules\admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;

/**
 * CustomerSearch represents the model behind the search form about `app\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customerGroupId', 'isActive'], 'integer'],
            [['email', 'password', 'code', 'registrationIp', 'registrationTime', 'memo', 'authID', 'authMethod'], 'safe'],
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
        if (!empty($params[get_class($this)]))
            $params[get_class($this)] = array_map("trim", $params[get_class($this)]);

        $query = Customer::find();

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
                'customerGroupId' => $this->customerGroupId,
                'isActive' => $this->isActive,
                'registrationTime' => $this->registrationTime,
            ]);
        $query->orderBy('id desc');
        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'registrationIp', $this->registrationIp])
            ->andFilterWhere(['like', 'memo', $this->memo])
            ->andFilterWhere(['like', 'authID', $this->authID])
            ->andFilterWhere(['like', 'authMethod', $this->authMethod]);

        return $dataProvider;
    }
}
