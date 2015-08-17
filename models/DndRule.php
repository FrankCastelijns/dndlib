<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_rule".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $body
 * @property string $body_html
 * @property integer $rulebook_id
 * @property integer $page_from
 * @property integer $page_to
 *
 * @property DndRulebook $rulebook
 */
class DndRule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_rule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'slug', 'body', 'body_html', 'rulebook_id'], 'required'],
            [['id', 'rulebook_id', 'page_from', 'page_to'], 'integer'],
            [['body', 'body_html'], 'string'],
            [['name', 'slug'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'body' => 'Body',
            'body_html' => 'Body Html',
            'rulebook_id' => 'Rulebook ID',
            'page_from' => 'Page From',
            'page_to' => 'Page To',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRulebook()
    {
        return $this->hasOne(DndRulebook::className(), ['id' => 'rulebook_id']);
    }
}
