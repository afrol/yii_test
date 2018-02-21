<?php

use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii2mod\editable\EditableColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UploadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<?php $form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data']
]);?>

<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'imageFiles[]')->widget(FileInput::classname(), [
            'options'=>['accept'=>'image/*', 'multiple'=>true],
            'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'], 'uploadUrl' => Url::to(['/site/file-upload']),]
        ]);?>
        </div>
    <div class="col-md-6">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn',],
                //'name',
                [
                    'class' => EditableColumn::class,
                    'attribute' => 'name',
                    'url' => ['/upload/change'],
                ],
                //'filename',
                [
                    'attribute' => 'filename',
                    'format' => 'html',
                    'label' => 'Image',
                    'value' => function ($data) use ($model) {
                        return Html::img($model->getImageDir() . $data['filename'],
                            ['width' => '60px']);
                    },
                ],
                'date_added',
                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>
</div>

<?php ActiveForm::end();?>


