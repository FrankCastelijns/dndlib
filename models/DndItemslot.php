<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_itemslot".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 *
 * @property DndItem[] $dndItems
 */
class DndItemslot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_itemslot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'slug'], 'required'],
            [['id'], 'integer'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndItems()
    {
        return $this->hasMany(DndItem::className(), ['body_slot_id' => 'id']);
    }
}
