<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_racespeed".
 *
 * @property integer $id
 * @property integer $type_id
 * @property integer $speed
 * @property integer $race_id
 *
 * @property DndRace $race
 * @property DndRacespeedtype $type
 */
class DndRacespeed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_racespeed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type_id', 'speed', 'race_id'], 'required'],
            [['id', 'type_id', 'speed', 'race_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
            'speed' => 'Speed',
            'race_id' => 'Race ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRace()
    {
        return $this->hasOne(DndRace::className(), ['id' => 'race_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(DndRacespeedtype::className(), ['id' => 'type_id']);
    }
}
