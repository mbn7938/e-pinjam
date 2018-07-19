<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Bahagian]].
 *
 * @see Bahagian
 */
class BahagianQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Bahagian[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Bahagian|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
