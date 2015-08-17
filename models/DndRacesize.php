<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_racesize".
 *
 * @property integer $id
 * @property string $name
 * @property integer $order
 * @property string $description
 *
 * @property DndMonster[] $dndMonsters
 * @property DndRace[] $dndRaces
 */
class DndRacesize extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_racesize';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'order', 'description'], 'required'],
            [['id', 'order'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 32]
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
            'order' => 'Order',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndMonsters()
    {
        return $this->hasMany(DndMonster::className(), ['size_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndRaces()
    {
        return $this->hasMany(DndRace::className(), ['size_id' => 'id']);
    }
}
