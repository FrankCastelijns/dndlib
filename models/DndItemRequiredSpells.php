<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_item_required_spells".
 *
 * @property integer $id
 * @property integer $item_id
 * @property integer $spell_id
 *
 * @property DndItem $item
 * @property DndSpell $spell
 */
class DndItemRequiredSpells extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_item_required_spells';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'item_id', 'spell_id'], 'required'],
            [['id', 'item_id', 'spell_id'], 'integer']
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
            'spell_id' => 'Spell ID',
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
    public function getSpell()
    {
        return $this->hasOne(DndSpell::className(), ['id' => 'spell_id']);
    }
}
