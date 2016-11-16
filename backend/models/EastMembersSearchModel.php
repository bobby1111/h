<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\EastEastMembers;

/**
 * EastMembersSearchModel represents the model behind the search form about `backend\models\EastMembers`.
 */
class EastMembersSearchModel extends EastMembers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'bind_uid', 'sex', 'phone', 'created_at', 'updated_at'], 'integer'],
            [['username', 'email', 'code'], 'safe'],
            [['trade_day', 'trade_total'], 'number'],
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
        $uid = Yii::$app->user->id;

        $query = EastMembers::find()->where(['bind_uid' => $uid]);

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
            'bind_uid' => $this->bind_uid,
            'sex' => $this->sex,
            'phone' => $this->phone,
            'trade_day' => $this->trade_day,
            'trade_total' => $this->trade_total,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}
