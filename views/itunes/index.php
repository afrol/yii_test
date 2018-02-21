<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItunesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Itunes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="itunes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Itunes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'transaction_id',
            'original_transaction_id',
            'profile_id',
            'order_id',
            //'payment_state',
            //'new_receipt:ntext',
            //'req_receipt:ntext',
            'product_id',
            //'status',
            //'expires_date',
            //'created_at',
            //'updated_at',
            //'environment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
