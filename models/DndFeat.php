<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_feat".
 *
 * @property integer $id
 * @property integer $rulebook_id
 * @property string $name
 * @property string $description
 * @property string $benefit
 * @property string $special
 * @property string $normal
 * @property integer $page
 * @property string $slug
 * @property string $description_html
 * @property string $benefit_html
 * @property string $special_html
 * @property string $normal_html
 *
 * @property DndCharacterclassvariantrequiresfeat[] $dndCharacterclassvariantrequiresfeats
 * @property DndRulebook $rulebook
 * @property DndFeatFeatCategories[] $dndFeatFeatCategories
 * @property DndFeatrequiresfeat[] $dndFeatrequiresfeats
 * @property DndFeatrequiresfeat[] $dndFeatrequiresfeats0
 * @property DndFeatrequiresskill[] $dndFeatrequiresskills
 * @property DndFeatspecialfeatprerequisite[] $dndFeatspecialfeatprerequisites
 * @property DndItemRequiredFeats[] $dndItemRequiredFeats
 * @property DndMonsterhasfeat[] $dndMonsterhasfeats
 * @property DndTextfeatprerequisite[] $dndTextfeatprerequisites
 */
class DndFeat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_feat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'rulebook_id', 'name', 'description', 'benefit', 'special', 'normal', 'slug', 'description_html', 'benefit_html', 'special_html', 'normal_html'], 'required'],
            [['id', 'rulebook_id', 'page'], 'integer'],
            [['description', 'benefit', 'special', 'normal', 'description_html', 'benefit_html', 'special_html', 'normal_html'], 'string'],
            [['name', 'slug'], 'string', 'max' => 64]
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
            'description' => 'Description',
            'benefit' => 'Benefit',
            'special' => 'Special',
            'normal' => 'Normal',
            'page' => 'Page',
            'slug' => 'Slug',
            'description_html' => 'Description Html',
            'benefit_html' => 'Benefit Html',
            'special_html' => 'Special Html',
            'normal_html' => 'Normal Html',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndCharacterclassvariantrequiresfeats()
    {
        return $this->hasMany(DndCharacterclassvariantrequiresfeat::className(), ['feat_id' => 'id']);
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
    public function getDndFeatFeatCategories()
    {
        return $this->hasMany(DndFeatFeatCategories::className(), ['feat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndFeatrequiresfeats()
    {
        return $this->hasMany(DndFeatrequiresfeat::className(), ['required_feat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndFeatrequiresfeats0()
    {
        return $this->hasMany(DndFeatrequiresfeat::className(), ['source_feat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndFeatrequiresskills()
    {
        return $this->hasMany(DndFeatrequiresskill::className(), ['feat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndFeatspecialfeatprerequisites()
    {
        return $this->hasMany(DndFeatspecialfeatprerequisite::className(), ['feat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndItemRequiredFeats()
    {
        return $this->hasMany(DndItemRequiredFeats::className(), ['feat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndMonsterhasfeats()
    {
        return $this->hasMany(DndMonsterhasfeat::className(), ['feat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndTextfeatprerequisites()
    {
        return $this->hasMany(DndTextfeatprerequisite::className(), ['feat_id' => 'id']);
    }
}
