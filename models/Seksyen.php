<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seksyen".
 *
 * @property int $id
 * @property string $name
 * @property string $short_term
 * @property string $created_at
 * @property string $updated_at
 * @property int $id_bahagian
 *
 * @property Bahagian $bahagian
 * @property Unit[] $units
 */
class Seksyen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seksyen';
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
            [['id_bahagian'], 'exist', 'skipOnError' => true, 'targetClass' => Bahagian::className(), 'targetAttribute' => ['id_bahagian' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'short_term' => 'Short Term',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'id_bahagian' => 'Id Bahagian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBahagian()
    {
        return $this->hasOne(Bahagian::className(), ['id' => 'id_bahagian']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnits()
    {
        return $this->hasMany(Unit::className(), ['id_seksyen' => 'id']);
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
