<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    const DIR_UPLOADS = 'uploads/';

    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [
                ['imageFiles'],
                'file',
                'skipOnEmpty' => false,
                'extensions' => 'png, jpg',
                'maxFiles' => 4,
                'maxSize' => 1204000,
                'tooBig' => 'Limit is 1MB'
            ],
        ];
    }

    public function upload2()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }

    public function upload()
    {
        $model = new Upload();
        $files = ['result' => false];
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $uid = uniqid(time(), true);
                $fileName = $uid . '.' . $file->extension;
                $path = self::DIR_UPLOADS . $fileName;

                $file->saveAs($path);

                $model->filename = $fileName;
                $model->name = $file->baseName. '.' . $file->extension;
                $model->user_id = Yii::$app->user->id;
                $model->date_added = date("Y-m-d H:i:s");
                $model->code = Upload::CODE_CAR;

                if ($model->validate()) {
                    $model->save();
                }

                $files[] = [
                    'result' => true,
                    'data' => [
                        'name' => $file->baseName. '.' . $file->extension,
                        'size' => $file->size,
                        'url' => $path,
                        'thumbnailUrl' => $path,
                        'deleteUrl' => 'image-delete?name=' . $fileName,
                        'deleteType' => 'POST',
                    ]
                ];
            }
            return $files;
        } else {
            return $files;
        }
    }

    public function getImageDir()
    {
        return Yii::$app->request->BaseUrl.'/'.self::DIR_UPLOADS;
    }
}
