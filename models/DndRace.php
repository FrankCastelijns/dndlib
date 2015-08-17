<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_race".
 *
 * @property integer $id
 * @property integer $rulebook_id
 * @property string $name
 * @property string $slug
 * @property integer $page
 * @property integer $str
 * @property integer $dex
 * @property integer $con
 * @property integer $int
 * @property integer $wis
 * @property integer $cha
 * @property integer $level_adjustment
 * @property integer $size_id
 * @property integer $space
 * @property integer $reach
 * @property string $combat
 * @property string $description
 * @property string $racial_traits
 * @property string $description_html
 * @property string $combat_html
 * @property string $racial_traits_html
 * @property integer $natural_armor
 * @property string $image
 * @property integer $race_type_id
 * @property integer $racial_hit_dice_count
 *
 * @property DndCharacterclassvariantrequiresrace[] $dndCharacterclassvariantrequiresraces
 * @property DndRacetype $raceType
 * @property DndRulebook $rulebook
 * @property DndRacesize $size
 * @property DndRaceAutomaticLanguages[] $dndRaceAutomaticLanguages
 * @property DndRaceBonusLanguages[] $dndRaceBonusLanguages
 * @property DndRacefavoredcharacterclass[] $dndRacefavoredcharacterclasses
 * @property DndRacespeed[] $dndRacespeeds
 */
class DndRace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_race';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'rulebook_id', 'name', 'slug', 'str', 'dex', 'int', 'wis', 'cha', 'combat', 'description', 'racial_traits', 'description_html', 'combat_html', 'racial_traits_html'], 'required'],
            [['id', 'rulebook_id', 'page', 'str', 'dex', 'con', 'int', 'wis', 'cha', 'level_adjustment', 'size_id', 'space', 'reach', 'natural_armor', 'race_type_id', 'racial_hit_dice_count'], 'integer'],
            [['combat', 'description', 'racial_traits', 'description_html', 'combat_html', 'racial_traits_html'], 'string'],
            [['name', 'slug'], 'string', 'max' => 32],
            [['image'], 'string', 'max' => 100]
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
            'str' => 'Str',
            'dex' => 'Dex',
            'con' => 'Con',
            'int' => 'Int',
            'wis' => 'Wis',
            'cha' => 'Cha',
            'level_adjustment' => 'Level Adjustment',
            'size_id' => 'Size ID',
            'space' => 'Space',
            'reach' => 'Reach',
            'combat' => 'Combat',
            'description' => 'Description',
            'racial_traits' => 'Racial Traits',
            'description_html' => 'Description Html',
            'combat_html' => 'Combat Html',
            'racial_traits_html' => 'Racial Traits Html',
            'natural_armor' => 'Natural Armor',
            'image' => 'Image',
            'race_type_id' => 'Race Type ID',
            'racial_hit_dice_count' => 'Racial Hit Dice Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndCharacterclassvariantrequiresraces()
    {
        return $this->hasMany(DndCharacterclassvariantrequiresrace::className(), ['race_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRaceType()
    {
        return $this->hasOne(DndRacetype::className(), ['id' => 'race_type_id']);
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
    public function getDndRaceAutomaticLanguages()
    {
        return $this->hasMany(DndRaceAutomaticLanguages::className(), ['race_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndRaceBonusLanguages()
    {
        return $this->hasMany(DndRaceBonusLanguages::className(), ['race_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndRacefavoredcharacterclasses()
    {
        return $this->hasMany(DndRacefavoredcharacterclass::className(), ['race_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndRacespeeds()
    {
        return $this->hasMany(DndRacespeed::className(), ['race_id' => 'id']);
    }
}
