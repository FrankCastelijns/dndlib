<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_racefavoredcharacterclass".
 *
 * @property integer $id
 * @property integer $race_id
 * @property integer $character_class_id
 * @property string $extra
 *
 * @property DndCharacterclass $characterClass
 * @property DndRace $race
 */
class DndRacefavoredcharacterclass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_racefavoredcharacterclass';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'race_id', 'character_class_id', 'extra'], 'required'],
            [['id', 'race_id', 'character_class_id'], 'integer'],
            [['extra'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'race_id' => 'Race ID',
            'character_class_id' => 'Character Class ID',
            'extra' => 'Extra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacterClass()
    {
        return $this->hasOne(DndCharacterclass::className(), ['id' => 'character_class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRace()
    {
        return $this->hasOne(DndRace::className(), ['id' => 'race_id']);
    }
}
