<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AssetLogistic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-logistic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_id')
        ->dropDownList(\app\models\AssetType::JenisAsetDropdown(),
            [
                'prompt' => Yii::t('app', 'Pilih Jenis Aset'),

            ])
    ?>


    <?= $form->field($model, 'status_id')
        ->dropDownList(\app\models\Status::StatusDropdown(),
            [
                'prompt' => Yii::t('app', 'Pilih Status'),

            ])
    ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Simpan'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
