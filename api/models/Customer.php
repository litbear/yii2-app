<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property integer $CustomerId
 * @property string $CompanyName
 * @property string $ContactName
 * @property string $Phone
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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CompanyName', 'ContactName', 'Phone', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['CompanyName', 'ContactName', 'Phone'], 'string', 'max' => 255],
            [['CompanyName'], 'unique'],
            [['ContactName'], 'unique'],
            [['Phone'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CustomerId' => 'Customer ID',
            'CompanyName' => 'Company Name',
            'ContactName' => 'Contact Name',
            'Phone' => 'Phone',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
