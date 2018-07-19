<?php


use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;



p2m\sbAdmin\assets\SBAdmin2Asset::register($this);
p2m\assets\TimelineAsset::register($this);
p2m\assets\MorrisAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Bahagian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bahagian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_term')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]); ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
