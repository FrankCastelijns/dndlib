<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_newsentry".
 *
 * @property integer $id
 * @property string $published
 * @property string $title
 * @property string $body
 * @property string $body_html
 * @property integer $enabled
 */
class DndNewsentry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_newsentry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'published', 'title', 'body', 'body_html', 'enabled'], 'required'],
            [['id', 'enabled'], 'integer'],
            [['published'], 'safe'],
            [['body', 'body_html'], 'string'],
            [['title'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'published' => 'Published',
            'title' => 'Title',
            'body' => 'Body',
            'body_html' => 'Body Html',
            'enabled' => 'Enabled',
        ];
    }
}
