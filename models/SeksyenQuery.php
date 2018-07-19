<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Seksyen]].
 *
 * @see Seksyen
 */
class SeksyenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Seksyen[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Seksyen|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
