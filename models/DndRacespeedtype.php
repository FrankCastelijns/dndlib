<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_racespeedtype".
 *
 * @property integer $id
 * @property string $name
 * @property string $extra
 *
 * @property DndMonsterspeed[] $dndMonsterspeeds
 * @property DndRacespeed[] $dndRacespeeds
 */
class DndRacespeedtype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_racespeedtype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name', 'extra'], 'string', 'max' => 32]
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
            'extra' => 'Extra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndMonsterspeeds()
    {
        return $this->hasMany(DndMonsterspeed::className(), ['type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndRacespeeds()
    {
        return $this->hasMany(DndRacespeed::className(), ['type_id' => 'id']);
    }
}
