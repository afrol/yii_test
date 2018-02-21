<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Itunes */

$this->title = $model->transaction_id;
$this->params['breadcrumbs'][] = ['label' => 'Itunes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="itunes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'transaction_id' => $model->transaction_id, 'profile_id' => $model->profile_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'transaction_id' => $model->transaction_id, 'profile_id' => $model->profile_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'transaction_id',
            'original_transaction_id',
            'profile_id',
            'order_id',
            'payment_state',
            'new_receipt:ntext',
            'req_receipt:ntext',
            'product_id',
            'status',
            'expires_date',
            'created_at',
            'updated_at',
            'environment',
        ],
    ]) ?>

</div>
