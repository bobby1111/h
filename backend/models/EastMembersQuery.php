<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[EastMembers]].
 *
 * @see EastMembers
 */
class EastMembersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EastMembers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EastMembers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
