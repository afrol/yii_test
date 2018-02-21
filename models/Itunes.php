<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "itunes_transactions".
 *
 * @property int $transaction_id
 * @property int $original_transaction_id
 * @property int $profile_id
 * @property int $order_id
 * @property int $payment_state
 * @property string $new_receipt
 * @property string $req_receipt
 * @property string $product_id
 * @property int $status
 * @property string $expires_date
 * @property string $created_at
 * @property string $updated_at
 * @property string $environment
 */
class Itunes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'itunes_transactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transaction_id', 'original_transaction_id', 'profile_id', 'order_id', 'payment_state', 'new_receipt', 'req_receipt', 'product_id', 'status', 'expires_date', 'created_at', 'updated_at'], 'required'],
            [['transaction_id', 'original_transaction_id', 'profile_id', 'order_id', 'payment_state', 'status'], 'integer'],
            [['new_receipt', 'req_receipt'], 'string'],
            [['expires_date', 'created_at', 'updated_at'], 'safe'],
            [['product_id'], 'string', 'max' => 100],
            [['environment'], 'string', 'max' => 32],
            [['transaction_id', 'profile_id'], 'unique', 'targetAttribute' => ['transaction_id', 'profile_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'transaction_id' => 'Transaction ID',
            'original_transaction_id' => 'Original Transaction ID',
            'profile_id' => 'Profile ID',
            'order_id' => 'Order ID',
            'payment_state' => 'Payment State',
            'new_receipt' => 'New Receipt',
            'req_receipt' => 'Req Receipt',
            'product_id' => 'Product ID',
            'status' => 'Status',
            'expires_date' => 'Expires Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'environment' => 'Environment',
        ];
    }
}
