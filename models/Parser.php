<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parser".
 *
 * @property int $id
 * @property int $service_id
 * @property string $link
 * @property string $notices
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Services $service
 */
class Parser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'link'], 'required'],
            [['service_id'], 'integer'],
            [['notices'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['link'], 'string', 'max' => 256],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'service_id' => 'Услуга',
            'link' => 'Ссылка',
            'notices' => 'Заметки',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }
}
