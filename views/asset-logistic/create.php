<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AssetLogistic */

$this->title = Yii::t('app', 'Tambah Aset');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Senarai Aset'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-logistic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
