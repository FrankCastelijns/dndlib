<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_skill".
 *
 * @property integer $id
 * @property string $name
 * @property string $base_skill
 * @property integer $trained_only
 * @property integer $armor_check_penalty
 * @property string $slug
 *
 * @property DndCharacterclassvariantClassSkills[] $dndCharacterclassvariantClassSkills
 * @property DndCharacterclassvariantrequiresskill[] $dndCharacterclassvariantrequiresskills
 * @property DndFeatrequiresskill[] $dndFeatrequiresskills
 * @property DndMonsterhasskill[] $dndMonsterhasskills
 * @property DndSkillvariant[] $dndSkillvariants
 */
class DndSkill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_skill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'base_skill', 'slug'], 'required'],
            [['id', 'trained_only', 'armor_check_penalty'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 64],
            [['base_skill'], 'string', 'max' => 4]
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
            'base_skill' => 'Base Skill',
            'trained_only' => 'Trained Only',
            'armor_check_penalty' => 'Armor Check Penalty',
            'slug' => 'Slug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndCharacterclassvariantClassSkills()
    {
        return $this->hasMany(DndCharacterclassvariantClassSkills::className(), ['skill_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndCharacterclassvariantrequiresskills()
    {
        return $this->hasMany(DndCharacterclassvariantrequiresskill::className(), ['skill_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndFeatrequiresskills()
    {
        return $this->hasMany(DndFeatrequiresskill::className(), ['skill_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndMonsterhasskills()
    {
        return $this->hasMany(DndMonsterhasskill::className(), ['skill_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndSkillvariants()
    {
        return $this->hasMany(DndSkillvariant::className(), ['skill_id' => 'id']);
    }
}
