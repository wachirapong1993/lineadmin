<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use \yii\web\UploadedFile;
/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $photo
 * @property string $photos
 * @property string $line_id
 * @property string $line_add
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 * @property int $age
 * @property int $province_id
 *
 * @property Category $category
 */
class Post extends \yii\db\ActiveRecord {

    public $upload_foler = 'uploads';

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'post';
    }

    public function behaviors() {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['category_id', 'name', 'age', 'province_id'], 'required'],
            [['category_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'age', 'province_id'], 'integer'],
            [['photos'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['photo'], 'file',
              'skipOnEmpty' => true,
              'extensions' => 'png,jpg'
            ],
            [['photos'], 'file',
              'skipOnEmpty' => true,
              'maxFiles' => 3,
              'extensions' => 'png,jpg'
            ],
            [['line_id', 'line_add'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'category_id' => 'ประเภทการโพส',
            'name' => 'ขื่อ',
            'photo' => 'รูป',
            'photos' => 'Photos',
            'line_id' => 'Line ID',
            'line_add' => 'Line@',
            'created_at' => 'วันที่โพส',
            'created_by' => 'ผู้โพส',
            'updated_at' => 'วันที่แก้ไข',
            'updated_by' => 'ผู้แก้ไข',
            'age' => 'อายุ',
            'province_id' => 'จังหวัด',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getProvince() {
        return $this->hasOne(\common\models\Province::className(), ['id' => 'province_id']);
    }

    public function upload($model, $attribute) {
        $photo = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadPath();
        if ($this->validate() && $photo !== null) {

            $fileName = md5($photo->baseName . time()) . '.' . $photo->extension;
            //$fileName = $photo->baseName . '.' . $photo->extension;
            if ($photo->saveAs($path . $fileName)) {
                return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getUploadPath() {
        return Yii::getAlias('@webroot') . '/' . $this->upload_foler . '/';
    }

    public function getUploadUrl() {
        return Yii::getAlias('@web') . '/' . $this->upload_foler . '/';
    }

    public function getPhotoViewer() {
        return empty($this->photo) ? Yii::getAlias('@web') . '/img/none.png' : $this->getUploadUrl() . $this->photo;
    }

}
