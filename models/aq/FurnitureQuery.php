<?php

namespace app\models\aq;

/**
 * This is the ActiveQuery class for [[Furniture]].
 *
 * @see Furniture
 */
class FurnitureQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Furniture[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Furniture|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
