<?php
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
?>

<?php $form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data']
]) ?>


<?= $form->field($model, 'imageFiles[]')->widget(FileInput::classname(), [
'options' => ['accept' => 'image/*'],
]);?>

<?= FileInput::widget([
    'name' => 'imageFiles[]',
    'options'=>[
        'multiple'=>true,
    ],
    'pluginOptions' => [
        'previewFileType' => 'any',
        'uploadUrl' => Url::to(['/site/file-upload']),
        'maxFileCount' => 10
    ]
]);?>



<?= FileInput::widget([
    'model' => $model,
'name' => 'imageFiles[]',
'options'=>[
'multiple'=>true
],
'pluginOptions' => [
'uploadUrl' => Url::to(['/site/file-upload']),
'uploadExtraData' => [
'album_id' => 20,
'cat_id' => 'Nature'
],
'maxFileCount' => 10
]
]);?>


<?php ActiveForm::end() ?>

