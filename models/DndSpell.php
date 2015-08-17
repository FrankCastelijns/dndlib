<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_spell".
 *
 * @property integer $id
 * @property string $added
 * @property integer $rulebook_id
 * @property integer $page
 * @property string $name
 * @property integer $school_id
 * @property integer $sub_school_id
 * @property integer $verbal_component
 * @property integer $somatic_component
 * @property integer $material_component
 * @property integer $arcane_focus_component
 * @property integer $divine_focus_component
 * @property integer $xp_component
 * @property string $casting_time
 * @property string $range
 * @property string $target
 * @property string $effect
 * @property string $area
 * @property string $duration
 * @property string $saving_throw
 * @property string $spell_resistance
 * @property string $description
 * @property string $slug
 * @property integer $meta_breath_component
 * @property integer $true_name_component
 * @property string $extra_components
 * @property string $description_html
 * @property integer $corrupt_component
 * @property integer $corrupt_level
 * @property integer $verified
 * @property integer $verified_author_id
 * @property string $verified_time
 *
 * @property DndItemRequiredSpells[] $dndItemRequiredSpells
 * @property AuthUser $verifiedAuthor
 * @property DndRulebook $rulebook
 * @property DndSpellschool $school
 * @property DndSpellsubschool $subSchool
 * @property DndSpellDescriptors[] $dndSpellDescriptors
 * @property DndSpellclasslevel[] $dndSpellclasslevels
 * @property DndSpelldomainlevel[] $dndSpelldomainlevels
 */
class DndSpell extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_spell';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'added', 'rulebook_id', 'name', 'school_id', 'description', 'slug', 'meta_breath_component', 'true_name_component', 'description_html', 'corrupt_component', 'verified'], 'required'],
            [['id', 'rulebook_id', 'page', 'school_id', 'sub_school_id', 'verbal_component', 'somatic_component', 'material_component', 'arcane_focus_component', 'divine_focus_component', 'xp_component', 'meta_breath_component', 'true_name_component', 'corrupt_component', 'corrupt_level', 'verified', 'verified_author_id'], 'integer'],
            [['added', 'verified_time'], 'safe'],
            [['description', 'description_html'], 'string'],
            [['name', 'spell_resistance', 'slug'], 'string', 'max' => 64],
            [['casting_time', 'range', 'target', 'effect', 'area', 'duration', 'extra_components'], 'string', 'max' => 256],
            [['saving_throw'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'added' => 'Added',
            'rulebook_id' => 'Rulebook ID',
            'page' => 'Page',
            'name' => 'Name',
            'school_id' => 'School ID',
            'sub_school_id' => 'Sub School ID',
            'verbal_component' => 'Verbal Component',
            'somatic_component' => 'Somatic Component',
            'material_component' => 'Material Component',
            'arcane_focus_component' => 'Arcane Focus Component',
            'divine_focus_component' => 'Divine Focus Component',
            'xp_component' => 'Xp Component',
            'casting_time' => 'Casting Time',
            'range' => 'Range',
            'target' => 'Target',
            'effect' => 'Effect',
            'area' => 'Area',
            'duration' => 'Duration',
            'saving_throw' => 'Saving Throw',
            'spell_resistance' => 'Spell Resistance',
            'description' => 'Description',
            'slug' => 'Slug',
            'meta_breath_component' => 'Meta Breath Component',
            'true_name_component' => 'True Name Component',
            'extra_components' => 'Extra Components',
            'description_html' => 'Description Html',
            'corrupt_component' => 'Corrupt Component',
            'corrupt_level' => 'Corrupt Level',
            'verified' => 'Verified',
            'verified_author_id' => 'Verified Author ID',
            'verified_time' => 'Verified Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndItemRequiredSpells()
    {
        return $this->hasMany(DndItemRequiredSpells::className(), ['spell_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerifiedAuthor()
    {
        return $this->hasOne(AuthUser::className(), ['id' => 'verified_author_id']);
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
    public function getSchool()
    {
        return $this->hasOne(DndSpellschool::className(), ['id' => 'school_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubSchool()
    {
        return $this->hasOne(DndSpellsubschool::className(), ['id' => 'sub_school_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndSpellDescriptors()
    {
        return $this->hasMany(DndSpellDescriptors::className(), ['spell_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndSpellclasslevels()
    {
        return $this->hasMany(DndSpellclasslevel::className(), ['spell_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndSpelldomainlevels()
    {
        return $this->hasMany(DndSpelldomainlevel::className(), ['spell_id' => 'id']);
    }
     /**
     * @return string
     */
    public function getClassAndLevels(){
        $gridviewoutput = "";
        foreach ($this->dndSpellclasslevels as $spellclasslevel){
            $class = $spellclasslevel->characterClass;
            $gridviewoutput.=$class->name." ".$spellclasslevel->level.", ";
        }
        foreach ($this->dndSpelldomainlevels as $spelldomainlevel){
            $domain = $spelldomainlevel->domain;
            $gridviewoutput.=$domain->name." ".$spelldomainlevel->level.", ";
        }
        $gridviewoutput_trimmed = rtrim($gridviewoutput,', ');
        return $gridviewoutput_trimmed;
    }
     /**
     * @return string
     */
    public function getDescriptors(){
        $gridviewoutput = "";
        foreach ($this->dndSpellDescriptors as $spelldescriptor){
            $desc = $spelldescriptor->spelldescriptor;
            $gridviewoutput.=$desc->name.", ";
        }
        $gridviewoutput_trimmed = rtrim($gridviewoutput,', ');
        return $gridviewoutput_trimmed;
    }
}
