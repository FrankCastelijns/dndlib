<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_spell_descriptors".
 *
 * @property integer $id
 * @property integer $spell_id
 * @property integer $spelldescriptor_id
 *
 * @property DndSpelldescriptor $spelldescriptor
 * @property DndSpell $spell
 */
class DndSpellDescriptors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_spell_descriptors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'spell_id', 'spelldescriptor_id'], 'required'],
            [['id', 'spell_id', 'spelldescriptor_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'spell_id' => 'Spell ID',
            'spelldescriptor_id' => 'Spelldescriptor ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpelldescriptor()
    {
        return $this->hasOne(DndSpelldescriptor::className(), ['id' => 'spelldescriptor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpell()
    {
        return $this->hasOne(DndSpell::className(), ['id' => 'spell_id']);
    }
}
