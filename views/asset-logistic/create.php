<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AssetLogistic */

$this->title = Yii::t('app', 'Create Asset Logistic');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asset Logistics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-logistic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
