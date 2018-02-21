<?php
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
?>

<?php $form = ActiveForm::begin(
    [
        'options' => ['enctype' => 'multipart/form-data'],
    ]
) ?>

<?= FileInput::widget([
    'model' => $model,
    'name' => 'imageFiles[]',
    'options'=>[
        'multiple'=>true
    ],
    'pluginOptions' => [
        'uploadUrl' => Url::to(['/site/file-upload']),
        'maxFileCount' => 10
    ]
]);?>

<?php ActiveForm::end() ?>