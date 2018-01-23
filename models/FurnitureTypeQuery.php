<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[FurnitureType]].
 *
 * @see FurnitureType
 */
class FurnitureTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return FurnitureType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FurnitureType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
