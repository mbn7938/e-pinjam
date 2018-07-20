<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property int $id
 * @property string $name
 * @property string $short_term
 * @property string $created_at
 * @property string $updates_at
 * @property int $id_seksyen
 *
 * @property Seksyen $seksyen
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit';
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
            [['id_seksyen'], 'exist', 'skipOnError' => true, 'targetClass' => Seksyen::className(), 'targetAttribute' => ['id_seksyen' => 'id']],
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
            'updates_at' => 'Updates At',
            'id_seksyen' => 'Id Seksyen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeksyen()
    {
        return $this->hasOne(Seksyen::className(), ['id' => 'id_seksyen']);
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
