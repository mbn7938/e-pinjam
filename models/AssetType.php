<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asset_type".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $status_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AssetLogistic[] $assetLogistics
 * @property Status $status
 */
class AssetType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'status_id', 'created_at', 'updated_at'], 'required'],
            [['status_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'description'], 'string', 'max' => 255],
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
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'status_id' => Yii::t('app', 'Status ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssetLogistics()
    {
        return $this->hasMany(AssetLogistic::className(), ['type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * {@inheritdoc}
     * @return AssetTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AssetTypeQuery(get_called_class());
    }

    public static function JenisAsetDropdown()
    {
        static $dropdown;

        if ($dropdown === null) {

            $models = static::find()
                ->orderBy(['description' => SORT_ASC])
                ->all();

            foreach ($models as $value) {
                $dropdown[$value->id] =
                    'Nama :'.$value['name'].' | 
                    Keterangan Produk : '.$value['description'];
            }
            return $dropdown;

        }

    }
}
