<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_characterclass".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property integer $prestige
 * @property string $short_description
 * @property string $short_description_html
 *
 * @property DndCharacterclassvariant[] $dndCharacterclassvariants
 * @property DndRacefavoredcharacterclass[] $dndRacefavoredcharacterclasses
 * @property DndSpellclasslevel[] $dndSpellclasslevels
 */
class DndCharacterclass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_characterclass';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'slug', 'short_description', 'short_description_html'], 'required'],
            [['id', 'prestige'], 'integer'],
            [['short_description', 'short_description_html'], 'string'],
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
            'name' => 'Name',
            'slug' => 'Slug',
            'prestige' => 'Prestige',
            'short_description' => 'Short Description',
            'short_description_html' => 'Short Description Html',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndCharacterclassvariants()
    {
        return $this->hasMany(DndCharacterclassvariant::className(), ['character_class_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndRacefavoredcharacterclasses()
    {
        return $this->hasMany(DndRacefavoredcharacterclass::className(), ['character_class_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndSpellclasslevels()
    {
        return $this->hasMany(DndSpellclasslevel::className(), ['character_class_id' => 'id']);
    }
}
