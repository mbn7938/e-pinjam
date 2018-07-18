<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RentTransaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rent-transaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput(['value' => Yii::$app->user->identity->username, 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'asset_id')
        ->dropDownList(\app\models\AssetLogistic::AsetDropdown(),
            [
                'prompt' => Yii::t('app', 'Pilih Aset yang hendak di pinjam'),

            ])
    ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
