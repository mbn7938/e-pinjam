<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%seksyen}}".
 *
 * @property int $id
 * @property string $name
 * @property string $short_term
 * @property string $created_at
 * @property string $updated_at
 * @property int $id_bahagian
 */
class Seksyen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%seksyen}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'short_term', 'id_bahagian'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['id_bahagian'], 'integer'],
            [['name'], 'string', 'max' => 250],
            [['short_term'], 'string', 'max' => 100],
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
            'id_bahagian' => Yii::t('app', 'Id Bahagian'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return SeksyenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SeksyenQuery(get_called_class());
    }
}
