<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_rulebook".
 *
 * @property integer $id
 * @property integer $dnd_edition_id
 * @property string $name
 * @property string $abbr
 * @property string $description
 * @property string $year
 * @property string $official_url
 * @property string $slug
 * @property string $image
 * @property string $published
 *
 * @property DndCharacterclassvariant[] $dndCharacterclassvariants
 * @property DndDomainvariant[] $dndDomainvariants
 * @property DndFeat[] $dndFeats
 * @property DndItem[] $dndItems
 * @property DndMonster[] $dndMonsters
 * @property DndRace[] $dndRaces
 * @property DndRule[] $dndRules
 * @property DndDndedition $dndEdition
 * @property DndSkillvariant[] $dndSkillvariants
 * @property DndSpell[] $dndSpells
 */
class DndRulebook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_rulebook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dnd_edition_id', 'name', 'abbr', 'description', 'official_url', 'slug'], 'required'],
            [['id', 'dnd_edition_id'], 'integer'],
            [['description'], 'string'],
            [['published'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 128],
            [['abbr'], 'string', 'max' => 7],
            [['year'], 'string', 'max' => 4],
            [['official_url'], 'string', 'max' => 255],
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
            'dnd_edition_id' => 'Dnd Edition ID',
            'name' => 'Name',
            'abbr' => 'Abbr',
            'description' => 'Description',
            'year' => 'Year',
            'official_url' => 'Official Url',
            'slug' => 'Slug',
            'image' => 'Image',
            'published' => 'Published',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndCharacterclassvariants()
    {
        return $this->hasMany(DndCharacterclassvariant::className(), ['rulebook_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndDomainvariants()
    {
        return $this->hasMany(DndDomainvariant::className(), ['rulebook_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndFeats()
    {
        return $this->hasMany(DndFeat::className(), ['rulebook_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndItems()
    {
        return $this->hasMany(DndItem::className(), ['rulebook_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndMonsters()
    {
        return $this->hasMany(DndMonster::className(), ['rulebook_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndRaces()
    {
        return $this->hasMany(DndRace::className(), ['rulebook_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndRules()
    {
        return $this->hasMany(DndRule::className(), ['rulebook_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndEdition()
    {
        return $this->hasOne(DndDndedition::className(), ['id' => 'dnd_edition_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndSkillvariants()
    {
        return $this->hasMany(DndSkillvariant::className(), ['rulebook_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndSpells()
    {
        return $this->hasMany(DndSpell::className(), ['rulebook_id' => 'id']);
    }
}
