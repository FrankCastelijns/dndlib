<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_monster".
 *
 * @property integer $id
 * @property integer $rulebook_id
 * @property string $name
 * @property string $slug
 * @property integer $page
 * @property integer $size_id
 * @property integer $type_id
 * @property string $hit_dice
 * @property integer $initiative
 * @property string $armor_class
 * @property integer $touch_armor_class
 * @property integer $flat_footed_armor_class
 * @property integer $base_attack
 * @property integer $grapple
 * @property string $attack
 * @property string $full_attack
 * @property integer $space
 * @property integer $reach
 * @property string $special_attacks
 * @property string $special_qualities
 * @property integer $fort_save
 * @property string $fort_save_extra
 * @property integer $reflex_save
 * @property string $reflex_save_extra
 * @property integer $will_save
 * @property string $will_save_extra
 * @property integer $str
 * @property integer $dex
 * @property integer $con
 * @property integer $int
 * @property integer $wis
 * @property integer $cha
 * @property string $environment
 * @property string $organization
 * @property integer $challenge_rating
 * @property string $treasure
 * @property string $alignment
 * @property string $advancement
 * @property integer $level_adjustment
 * @property string $description
 * @property string $description_html
 * @property string $combat
 * @property string $combat_html
 *
 * @property DndRulebook $rulebook
 * @property DndRacesize $size
 * @property DndMonstertype $type
 * @property DndMonsterSubtypes[] $dndMonsterSubtypes
 * @property DndMonsterhasfeat[] $dndMonsterhasfeats
 * @property DndMonsterhasskill[] $dndMonsterhasskills
 * @property DndMonsterspeed[] $dndMonsterspeeds
 */
class DndMonster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_monster';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'rulebook_id', 'name', 'slug', 'type_id', 'hit_dice', 'initiative', 'base_attack', 'grapple', 'space', 'reach', 'special_attacks', 'special_qualities', 'fort_save', 'fort_save_extra', 'reflex_save', 'reflex_save_extra', 'will_save', 'will_save_extra', 'str', 'dex', 'int', 'wis', 'cha', 'environment', 'organization', 'challenge_rating', 'treasure', 'alignment', 'advancement', 'description', 'description_html', 'combat', 'combat_html'], 'required'],
            [['id', 'rulebook_id', 'page', 'size_id', 'type_id', 'initiative', 'touch_armor_class', 'flat_footed_armor_class', 'base_attack', 'grapple', 'space', 'reach', 'fort_save', 'reflex_save', 'will_save', 'str', 'dex', 'con', 'int', 'wis', 'cha', 'challenge_rating', 'level_adjustment'], 'integer'],
            [['description', 'description_html', 'combat', 'combat_html'], 'string'],
            [['name', 'slug', 'hit_dice', 'fort_save_extra', 'reflex_save_extra', 'will_save_extra'], 'string', 'max' => 32],
            [['armor_class', 'attack', 'full_attack', 'environment', 'organization', 'treasure'], 'string', 'max' => 128],
            [['special_attacks'], 'string', 'max' => 256],
            [['special_qualities'], 'string', 'max' => 512],
            [['alignment', 'advancement'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rulebook_id' => 'Rulebook ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'page' => 'Page',
            'size_id' => 'Size ID',
            'type_id' => 'Type ID',
            'hit_dice' => 'Hit Dice',
            'initiative' => 'Initiative',
            'armor_class' => 'Armor Class',
            'touch_armor_class' => 'Touch Armor Class',
            'flat_footed_armor_class' => 'Flat Footed Armor Class',
            'base_attack' => 'Base Attack',
            'grapple' => 'Grapple',
            'attack' => 'Attack',
            'full_attack' => 'Full Attack',
            'space' => 'Space',
            'reach' => 'Reach',
            'special_attacks' => 'Special Attacks',
            'special_qualities' => 'Special Qualities',
            'fort_save' => 'Fort Save',
            'fort_save_extra' => 'Fort Save Extra',
            'reflex_save' => 'Reflex Save',
            'reflex_save_extra' => 'Reflex Save Extra',
            'will_save' => 'Will Save',
            'will_save_extra' => 'Will Save Extra',
            'str' => 'Str',
            'dex' => 'Dex',
            'con' => 'Con',
            'int' => 'Int',
            'wis' => 'Wis',
            'cha' => 'Cha',
            'environment' => 'Environment',
            'organization' => 'Organization',
            'challenge_rating' => 'Challenge Rating',
            'treasure' => 'Treasure',
            'alignment' => 'Alignment',
            'advancement' => 'Advancement',
            'level_adjustment' => 'Level Adjustment',
            'description' => 'Description',
            'description_html' => 'Description Html',
            'combat' => 'Combat',
            'combat_html' => 'Combat Html',
        ];
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
    public function getSize()
    {
        return $this->hasOne(DndRacesize::className(), ['id' => 'size_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(DndMonstertype::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndMonsterSubtypes()
    {
        return $this->hasMany(DndMonsterSubtypes::className(), ['monster_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndMonsterhasfeats()
    {
        return $this->hasMany(DndMonsterhasfeat::className(), ['monster_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndMonsterhasskills()
    {
        return $this->hasMany(DndMonsterhasskill::className(), ['monster_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndMonsterspeeds()
    {
        return $this->hasMany(DndMonsterspeed::className(), ['race_id' => 'id']);
    }
}
