<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "upload".
 *
 * @property int $upload_id
 * @property int $user_id
 * @property string $name
 * @property string $filename
 * @property string $code
 * @property string $date_added
 */
class Upload extends \yii\db\ActiveRecord
{
    const CODE_CAR = 'car';
    const CODE_DEF = 'def';

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => 'date_added',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'upload';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'filename', 'date_added'], 'required'],
            [['user_id'], 'integer'],
            [['date_added','code'], 'safe'],
            [['name', 'filename', 'code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'upload_id' => 'Upload ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'filename' => 'Filename',
            'code' => 'Code',
            'date_added' => 'Date Added',
        ];
    }
}
