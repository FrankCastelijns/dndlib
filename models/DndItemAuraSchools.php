<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_item_aura_schools".
 *
 * @property integer $id
 * @property integer $item_id
 * @property integer $spellschool_id
 *
 * @property DndItem $item
 * @property DndSpellschool $spellschool
 */
class DndItemAuraSchools extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_item_aura_schools';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'item_id', 'spellschool_id'], 'required'],
            [['id', 'item_id', 'spellschool_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'spellschool_id' => 'Spellschool ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(DndItem::className(), ['id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpellschool()
    {
        return $this->hasOne(DndSpellschool::className(), ['id' => 'spellschool_id']);
    }
}
