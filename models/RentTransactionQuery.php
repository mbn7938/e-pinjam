<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RentTransaction]].
 *
 * @see RentTransaction
 */
class RentTransactionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RentTransaction[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RentTransaction|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
