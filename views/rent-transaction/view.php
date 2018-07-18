<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RentTransaction */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rent Transactions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rent-transaction-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'user_id',
                'label' => 'Peminjam',
                'value' => function($model){
                    return $model->user->username;
                }
            ],
            [
                    'attribute' => 'asset_id',
                    'label' => 'Aset',
                    'value' => function($model){
                        return $model->asset->name;
                    }
            ],
            [
                'attribute' => 'status_id',
                'label' => 'Status',
                'value' => function($model){
                    return $model->status->name;
                }
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
