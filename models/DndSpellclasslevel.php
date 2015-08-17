<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_spellclasslevel".
 *
 * @property integer $id
 * @property integer $character_class_id
 * @property integer $spell_id
 * @property integer $level
 * @property string $extra
 *
 * @property DndCharacterclass $characterClass
 * @property DndSpell $spell
 */
class DndSpellclasslevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_spellclasslevel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'character_class_id', 'spell_id', 'level', 'extra'], 'required'],
            [['id', 'character_class_id', 'spell_id', 'level'], 'integer'],
            [['extra'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'character_class_id' => 'Character Class ID',
            'spell_id' => 'Spell ID',
            'level' => 'Level',
            'extra' => 'Extra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacterClass()
    {
        return $this->hasOne(DndCharacterclass::className(), ['id' => 'character_class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpell()
    {
        return $this->hasOne(DndSpell::className(), ['id' => 'spell_id']);
    }
}
