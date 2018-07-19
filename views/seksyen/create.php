<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Seksyen */

$this->title = 'Create Seksyen';
$this->params['breadcrumbs'][] = ['label' => 'Seksyens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seksyen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
