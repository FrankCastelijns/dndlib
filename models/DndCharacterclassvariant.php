<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_characterclassvariant".
 *
 * @property integer $id
 * @property integer $character_class_id
 * @property integer $rulebook_id
 * @property integer $page
 * @property string $advancement
 * @property string $advancement_html
 * @property string $class_features
 * @property integer $skill_points
 * @property integer $hit_die
 * @property string $alignment
 * @property string $class_features_html
 * @property string $requirements
 * @property string $requirements_html
 * @property integer $required_bab
 * @property string $starting_gold
 *
 * @property DndCharacterclass $characterClass
 * @property DndRulebook $rulebook
 * @property DndCharacterclassvariantClassSkills[] $dndCharacterclassvariantClassSkills
 * @property DndCharacterclassvariantrequiresfeat[] $dndCharacterclassvariantrequiresfeats
 * @property DndCharacterclassvariantrequiresrace[] $dndCharacterclassvariantrequiresraces
 * @property DndCharacterclassvariantrequiresskill[] $dndCharacterclassvariantrequiresskills
 */
class DndCharacterclassvariant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_characterclassvariant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'character_class_id', 'rulebook_id', 'advancement', 'advancement_html', 'class_features', 'alignment', 'class_features_html', 'requirements', 'requirements_html', 'starting_gold'], 'required'],
            [['id', 'character_class_id', 'rulebook_id', 'page', 'skill_points', 'hit_die', 'required_bab'], 'integer'],
            [['advancement', 'advancement_html', 'class_features', 'class_features_html', 'requirements', 'requirements_html'], 'string'],
            [['alignment'], 'string', 'max' => 256],
            [['starting_gold'], 'string', 'max' => 32]
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
            'rulebook_id' => 'Rulebook ID',
            'page' => 'Page',
            'advancement' => 'Advancement',
            'advancement_html' => 'Advancement Html',
            'class_features' => 'Class Features',
            'skill_points' => 'Skill Points',
            'hit_die' => 'Hit Die',
            'alignment' => 'Alignment',
            'class_features_html' => 'Class Features Html',
            'requirements' => 'Requirements',
            'requirements_html' => 'Requirements Html',
            'required_bab' => 'Required Bab',
            'starting_gold' => 'Starting Gold',
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
    public function getRulebook()
    {
        return $this->hasOne(DndRulebook::className(), ['id' => 'rulebook_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndCharacterclassvariantClassSkills()
    {
        return $this->hasMany(DndCharacterclassvariantClassSkills::className(), ['characterclassvariant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndCharacterclassvariantrequiresfeats()
    {
        return $this->hasMany(DndCharacterclassvariantrequiresfeat::className(), ['character_class_variant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndCharacterclassvariantrequiresraces()
    {
        return $this->hasMany(DndCharacterclassvariantrequiresrace::className(), ['character_class_variant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndCharacterclassvariantrequiresskills()
    {
        return $this->hasMany(DndCharacterclassvariantrequiresskill::className(), ['character_class_variant_id' => 'id']);
    }
}
