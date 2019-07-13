<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "common_settings".
 *
 * @property string $_key
 * @property int $_value
 */
class CommonSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'common_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_key', '_value'], 'required'],
            [['_value'], 'integer'],
            [['_key'], 'string', 'max' => 64],
            [['_key', '_value'], 'unique', 'targetAttribute' => ['_key', '_value']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_key' => 'Key',
            '_value' => 'Value',
        ];
    }
}
