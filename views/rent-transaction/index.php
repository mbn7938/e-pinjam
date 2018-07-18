<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RentTransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Rent Transactions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rent-transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Rent Transaction'), ['create'], ['class' => 'btn btn-success']) ?>

        <?= Html::a(Yii::t('app', 'Approval'), ['/rent-transaction-approval/index'], ['class' => 'btn btn-info pull-right']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'user_id',
                'label' => 'Nama Peminjam',
                'value' => function ($model) {
                    return $model->user->username;
                }

            ],
            [
                'attribute' => 'asset_id',
                'label' => 'Aset yang ingin di pinjam',
                'value' => function ($model) {
                    return $model->asset->name;
                }

            ],
            [
                'attribute' => 'status_id',
                'label' => 'Status',
                'format'=> 'html',
                'value' => function($model){
                    return '<span class="label label-'.
                        $model->status->class.'">'.$model->status->name.'</span>';
                }

            ],
            'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
