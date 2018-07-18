<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RentTransaction */

$this->title = 'Create Rent Transaction';
$this->params['breadcrumbs'][] = ['label' => 'Rent Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rent-transaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>