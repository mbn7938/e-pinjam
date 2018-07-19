<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bahagian".
 *
 * @property int $id
 * @property string $name
 * @property string $short_term
 * @property string $created_at
 * @property string $updated_at
 */
class Bahagian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bahagian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'short_term', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'short_term'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'short_term' => Yii::t('app', 'Short Term'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return BahagianQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BahagianQuery(get_called_class());
    }
}
