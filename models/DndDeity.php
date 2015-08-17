<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_deity".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $description_html
 * @property string $alignment
 * @property integer $favored_weapon_id
 *
 * @property DndItem $favoredWeapon
 * @property DndDomainvariantDeities[] $dndDomainvariantDeities
 * @property DndDomainvariantOtherDeities[] $dndDomainvariantOtherDeities
 */
class DndDeity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_deity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'slug', 'description', 'description_html', 'alignment'], 'required'],
            [['id', 'favored_weapon_id'], 'integer'],
            [['description', 'description_html'], 'string'],
            [['name', 'slug'], 'string', 'max' => 64],
            [['alignment'], 'string', 'max' => 2]
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
            'description' => 'Description',
            'description_html' => 'Description Html',
            'alignment' => 'Alignment',
            'favored_weapon_id' => 'Favored Weapon ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavoredWeapon()
    {
        return $this->hasOne(DndItem::className(), ['id' => 'favored_weapon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndDomainvariantDeities()
    {
        return $this->hasMany(DndDomainvariantDeities::className(), ['deity_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndDomainvariantOtherDeities()
    {
        return $this->hasMany(DndDomainvariantOtherDeities::className(), ['deity_id' => 'id']);
    }
}
