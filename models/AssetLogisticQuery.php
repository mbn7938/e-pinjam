<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AssetLogistic]].
 *
 * @see AssetLogistic
 */
class AssetLogisticQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AssetLogistic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AssetLogistic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
