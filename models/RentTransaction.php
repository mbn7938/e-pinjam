<?php

namespace app\models;


use amnah\yii2\user\models\User;
use Yii;

/**
 * This is the model class for table "rent_transaction".
 *
 * @property int $id
 * @property int $user_id
 * @property int $asset_id
 * @property int $status_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 * @property AssetLogistic $asset
 * @property Status $status
 */
class RentTransaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rent_transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'asset_id', 'status_id', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'asset_id', 'status_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['asset_id'], 'exist', 'skipOnError' => true, 'targetClass' => AssetLogistic::className(), 'targetAttribute' => ['asset_id' => 'id']],
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
            'user_id' => Yii::t('app', 'Nama Penyewa'),
            'asset_id' => Yii::t('app', 'Aset Dipinjam'),
            'status_id' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsset()
    {
        return $this->hasOne(AssetLogistic::className(), ['id' => 'asset_id']);
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
     * @return RentTransactionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RentTransactionQuery(get_called_class());
    }
}
