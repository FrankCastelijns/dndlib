<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_racetype".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property integer $hit_die_size
 * @property string $base_attack_type
 * @property string $base_fort_save_type
 * @property string $base_reflex_save_type
 * @property string $base_will_save_type
 *
 * @property DndRace[] $dndRaces
 */
class DndRacetype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_racetype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'slug', 'hit_die_size', 'base_attack_type', 'base_fort_save_type', 'base_reflex_save_type', 'base_will_save_type'], 'required'],
            [['id', 'hit_die_size'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 32],
            [['base_attack_type'], 'string', 'max' => 3],
            [['base_fort_save_type', 'base_reflex_save_type', 'base_will_save_type'], 'string', 'max' => 4]
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
            'hit_die_size' => 'Hit Die Size',
            'base_attack_type' => 'Base Attack Type',
            'base_fort_save_type' => 'Base Fort Save Type',
            'base_reflex_save_type' => 'Base Reflex Save Type',
            'base_will_save_type' => 'Base Will Save Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndRaces()
    {
        return $this->hasMany(DndRace::className(), ['race_type_id' => 'id']);
    }
}
