<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property string $name
 * @property string $class
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AssetLogistic[] $assetLogistics
 * @property AssetType[] $assetTypes
 * @property RentTransaction[] $rentTransactions
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'class', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'class'], 'string', 'max' => 125],
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
            'class' => Yii::t('app', 'Class'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssetLogistics()
    {
        return $this->hasMany(AssetLogistic::className(), ['status_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssetTypes()
    {
        return $this->hasMany(AssetType::className(), ['status_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRentTransactions()
    {
        return $this->hasMany(RentTransaction::className(), ['status_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return StatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StatusQuery(get_called_class());
    }

    public static function StatusDropdown()
    {
        static $dropdown;

        if ($dropdown === null) {

            $models = static::find()
                ->orderBy(['name' => SORT_ASC])
                ->all();

            foreach ($models as $value) {
                $dropdown[$value->id] = $value['name'];
            }
            return $dropdown;

        }

    }
}
