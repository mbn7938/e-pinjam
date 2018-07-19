<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%unit}}".
 *
 * @property int $id
 * @property string $name
 * @property string $short_term
 * @property string $created_at
 * @property string $updates_at
 * @property int $id_seksyen
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%unit}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'short_term', 'id_seksyen'], 'required'],
            [['created_at', 'updates_at'], 'safe'],
            [['id_seksyen'], 'integer'],
            [['name', 'short_term'], 'string', 'max' => 255],
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
            'updates_at' => Yii::t('app', 'Updates At'),
            'id_seksyen' => Yii::t('app', 'Id Seksyen'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UnitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UnitQuery(get_called_class());
    }
}
