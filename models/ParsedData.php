<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parsed_data".
 *
 * @property int $id
 * @property string $ts
 * @property string $msg
 * @property string $positive
 * @property string $negative
 * @property double $rating_percent
 * @property int $created_at
 * @property int $updated_at
 */
class ParsedData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parsed_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ts'], 'safe'],
            [['msg', 'positive', 'negative', 'rating_percent', 'created_at', 'updated_at'], 'required'],
            [['msg'], 'string'],
            [['rating_percent'], 'number'],
            [['created_at', 'updated_at'], 'integer'],
            [['positive', 'negative'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ts' => 'Ts',
            'msg' => 'Msg',
            'positive' => 'Positive',
            'negative' => 'Negative',
            'rating_percent' => 'Rating Percent',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
