<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RentTransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rent Transactions Approval';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rent-transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],



            [
                'attribute'=>'user_id',
                'value'=> function($model)
                {
                    return $model->user->profile->full_name;
                }
            ],
            [
                'attribute'=>'asset_id',
                'value'=> function($model)
                {
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

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Tindakan',
                'buttons' => [
                    'approve' => function ($url, $model, $key) {
                        if ($model->status_id == 3) {
                            return Html::a('Lulus', [Url::to('rent-transaction-approval/approve?id=' . $model->id)]);
                        }
                    },
                    'reject' => function ($url, $model, $key) {
                        if ($model->status_id == 3) {
                            return Html::a('Batal', [Url::to('rent-transaction-approval/reject?id=' . $model->id)]);
                        }
                    },
                ],
                'template' => '{approve} {reject}'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
