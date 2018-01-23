<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[FurnitureStyle]].
 *
 * @see FurnitureStyle
 */
class FurnitureStyleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return FurnitureStyle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FurnitureStyle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
