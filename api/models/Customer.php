<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property integer $customerId
 * @property string $companyName
 * @property string $contactName
 * @property string $phone
 * @property integer $created_at
 * @property integer $updated_at
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%customer}}';
    }
    
    /**
     * 
     * @return type
     */
    public function behaviors() {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['companyName', 'contactName', 'phone'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['companyName', 'contactName', 'phone'], 'string', 'max' => 255],
            [['companyName'], 'unique'],
            [['contactName'], 'unique'],
            [['phone'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customerId' => 'Customer ID',
            'companyName' => 'Company Name',
            'contactName' => 'Contact Name',
            'phone' => 'Phone',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
