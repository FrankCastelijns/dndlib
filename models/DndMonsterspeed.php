<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_monsterspeed".
 *
 * @property integer $id
 * @property integer $race_id
 * @property integer $type_id
 * @property integer $speed
 *
 * @property DndMonster $race
 * @property DndRacespeedtype $type
 */
class DndMonsterspeed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_monsterspeed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'race_id', 'type_id', 'speed'], 'required'],
            [['id', 'race_id', 'type_id', 'speed'], 'integer']
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
            'type_id' => 'Type ID',
            'speed' => 'Speed',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRace()
    {
        return $this->hasOne(DndMonster::className(), ['id' => 'race_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(DndRacespeedtype::className(), ['id' => 'type_id']);
    }
}
