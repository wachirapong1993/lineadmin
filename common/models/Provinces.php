<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "provinces".
 *
 * @property int $PROVINCE_ID
 * @property string $PROVINCE_CODE
 * @property string $PROVINCE_NAME
 * @property string $PROVINCE_NAME_ENG
 */
class Provinces extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provinces';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROVINCE_ID', 'PROVINCE_CODE', 'PROVINCE_NAME', 'PROVINCE_NAME_ENG'], 'required'],
            [['PROVINCE_ID'], 'integer'],
            [['PROVINCE_CODE'], 'string', 'max' => 2],
            [['PROVINCE_NAME', 'PROVINCE_NAME_ENG'], 'string', 'max' => 150],
            [['PROVINCE_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PROVINCE_ID' => 'Province  ID',
            'PROVINCE_CODE' => 'Province  Code',
            'PROVINCE_NAME' => 'Province  Name',
            'PROVINCE_NAME_ENG' => 'Province  Name  Eng',
        ];
    }
}
