<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_item".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property integer $rulebook_id
 * @property integer $page
 * @property integer $price_gp
 * @property integer $price_bonus
 * @property integer $item_level
 * @property integer $body_slot_id
 * @property integer $caster_level
 * @property integer $aura_id
 * @property string $aura_dc
 * @property integer $activation_id
 * @property double $weight
 * @property string $visual_description
 * @property string $description
 * @property string $description_html
 * @property string $type
 * @property integer $property_id
 * @property string $cost_to_create
 * @property integer $synergy_prerequisite_id
 * @property string $required_extra
 *
 * @property DndDeity[] $dndDeities
 * @property DndItemactivationtype $activation
 * @property DndItemauratype $aura
 * @property DndItemslot $bodySlot
 * @property DndItemproperty $property
 * @property DndRulebook $rulebook
 * @property DndItem $synergyPrerequisite
 * @property DndItem[] $dndItems
 * @property DndItemAuraSchools[] $dndItemAuraSchools
 * @property DndItemRequiredFeats[] $dndItemRequiredFeats
 * @property DndItemRequiredSpells[] $dndItemRequiredSpells
 */
class DndItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'slug', 'rulebook_id', 'aura_dc', 'visual_description', 'description', 'description_html', 'type', 'cost_to_create', 'required_extra'], 'required'],
            [['id', 'rulebook_id', 'page', 'price_gp', 'price_bonus', 'item_level', 'body_slot_id', 'caster_level', 'aura_id', 'activation_id', 'property_id', 'synergy_prerequisite_id'], 'integer'],
            [['weight'], 'number'],
            [['visual_description', 'description', 'description_html'], 'string'],
            [['name', 'slug', 'required_extra'], 'string', 'max' => 64],
            [['aura_dc'], 'string', 'max' => 16],
            [['type'], 'string', 'max' => 3],
            [['cost_to_create'], 'string', 'max' => 128]
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
            'slug' => 'Slug',
            'rulebook_id' => 'Rulebook ID',
            'page' => 'Page',
            'price_gp' => 'Price Gp',
            'price_bonus' => 'Price Bonus',
            'item_level' => 'Item Level',
            'body_slot_id' => 'Body Slot ID',
            'caster_level' => 'Caster Level',
            'aura_id' => 'Aura ID',
            'aura_dc' => 'Aura Dc',
            'activation_id' => 'Activation ID',
            'weight' => 'Weight',
            'visual_description' => 'Visual Description',
            'description' => 'Description',
            'description_html' => 'Description Html',
            'type' => 'Type',
            'property_id' => 'Property ID',
            'cost_to_create' => 'Cost To Create',
            'synergy_prerequisite_id' => 'Synergy Prerequisite ID',
            'required_extra' => 'Required Extra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndDeities()
    {
        return $this->hasMany(DndDeity::className(), ['favored_weapon_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivation()
    {
        return $this->hasOne(DndItemactivationtype::className(), ['id' => 'activation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAura()
    {
        return $this->hasOne(DndItemauratype::className(), ['id' => 'aura_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBodySlot()
    {
        return $this->hasOne(DndItemslot::className(), ['id' => 'body_slot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(DndItemproperty::className(), ['id' => 'property_id']);
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
    public function getSynergyPrerequisite()
    {
        return $this->hasOne(DndItem::className(), ['id' => 'synergy_prerequisite_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndItems()
    {
        return $this->hasMany(DndItem::className(), ['synergy_prerequisite_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndItemAuraSchools()
    {
        return $this->hasMany(DndItemAuraSchools::className(), ['item_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndItemRequiredFeats()
    {
        return $this->hasMany(DndItemRequiredFeats::className(), ['item_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndItemRequiredSpells()
    {
        return $this->hasMany(DndItemRequiredSpells::className(), ['item_id' => 'id']);
    }
}
