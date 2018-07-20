<?php

use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var app\modules\user\Module $module
 * @var app\modules\user\models\User $user
 * @var app\modules\user\models\Profile $profile
 * @var app\modules\user\models\Role $role
 * @var yii\widgets\ActiveForm $form
 */

$module = $this->context->module;
$role = $module->model("Role");
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($user, 'username')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($user, 'newPassword')->passwordInput() ?>

    <?= $form->field($profile, 'full_name'); ?>

    <?= $form->field($user, 'role_id')->dropDownList($role::dropdown()); ?>

    <?php
    $dataCategory = ArrayHelper::map(\app\models\Bahagian::find()->asArray()->all(), 'id', 'name');
    ?>

    <?= $form->field($user, 'unit_id')->dropDownList($dataCategory, [
        'id' => 'cat_id',
        'prompt' => 'Pilih Bahagian'
    ])->label('Bahagian') ?>


    <?= $form->field($user, 'unit_id')->label('Seksyen')->widget(DepDrop::classname(), [
        'options' => ['id' => 'subcat_id', 'placeholder' => 'Pilih Seksyen'],
        'pluginOptions' => [
            'depends' => ['cat_id'],
            'placeholder' => 'Pilih Seksyen',
            'url' => Url::to(['subcat'])
        ]
    ]) ?>


    <?= $form->field($user, 'unit_id')->label('Unit')->widget(DepDrop::classname(), [
        'options' => ['placeholder' => 'Pilih Unit'],
        'pluginOptions' => [
            'depends' => ['subcat_id'],
            'placeholder' => 'Pilih Unit',
            'url' => Url::to(['prod'])
        ]
    ]) ?>

    <?= $form->field($user, 'status')->dropDownList($user::statusDropdown()); ?>

    <?php // use checkbox for banned_at ?>
    <?php // convert `banned_at` to int so that the checkbox gets set properly ?>
    <?php $user->banned_at = $user->banned_at ? 1 : 0 ?>
    <?= Html::activeLabel($user, 'banned_at', ['label' => Yii::t('user', 'Banned')]); ?>
    <?= Html::activeCheckbox($user, 'banned_at'); ?>
    <?= Html::error($user, 'banned_at'); ?>

    <?= $form->field($user, 'banned_reason'); ?>

    <div class="form-group">
        <?= Html::submitButton($user->isNewRecord ? Yii::t('user', 'Create') : Yii::t('user', 'Update'), ['class' => $user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
