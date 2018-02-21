<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Itunes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="itunes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'transaction_id')->textInput() ?>

    <?= $form->field($model, 'original_transaction_id')->textInput() ?>

    <?= $form->field($model, 'profile_id')->textInput() ?>

    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'payment_state')->textInput() ?>

    <?= $form->field($model, 'new_receipt')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'req_receipt')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'expires_date')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'environment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
