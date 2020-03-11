<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DbTable;
use yii\db\Query;

/**
 * DbTableSearchModel represents the model behind the search form of `backend\models\DbTable`.
 */
class DbTableSearchModel
{
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = (new Query())->from(\src\Modules\Db\Domain\Entity\DbTable::TABLE_NAME);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dbTable = new \src\Modules\Db\Domain\Entity\DbTable();
        foreach ($params as $attr => $value) {
            $dbTable->{$attr} = $value;
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $dbTable->id,
            'created_at' => $dbTable->created_at,
            'updated_at' => $dbTable->updated_at,
            'created_by' => $dbTable->created_by,
            'updated_by' => $dbTable->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'name', $dbTable->name])
            ->andFilterWhere(['ilike', 'title', $dbTable->title]);

        return $dataProvider;
    }
}
