<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asset_logistic".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $type_id
 * @property int $status_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AssetType $type
 * @property Status $status
 * @property RentTransaction[] $rentTransactions
 */
class AssetLogistic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_logistic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'type_id', 'status_id', 'created_at', 'updated_at'], 'required'],
            [['type_id', 'status_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'description'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => AssetType::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Nama Aset'),
            'description' => Yii::t('app', 'Keterangan Aset'),
            'type_id' => Yii::t('app', 'Jenis Aset'),
            'status_id' => Yii::t('app', 'Status Aset'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(AssetType::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRentTransactions()
    {
        return $this->hasMany(RentTransaction::className(), ['asset_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return AssetLogisticQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AssetLogisticQuery(get_called_class());
    }

    public static function AsetDropdown()
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
