<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_spellschool".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 *
 * @property DndItemAuraSchools[] $dndItemAuraSchools
 * @property DndSpell[] $dndSpells
 */
class DndSpellschool extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_spellschool';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'slug'], 'required'],
            [['id'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 32]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndItemAuraSchools()
    {
        return $this->hasMany(DndItemAuraSchools::className(), ['spellschool_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndSpells()
    {
        return $this->hasMany(DndSpell::className(), ['school_id' => 'id']);
    }
}
