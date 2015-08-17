<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_monster_subtypes".
 *
 * @property integer $id
 * @property integer $monster_id
 * @property integer $monstersubtype_id
 *
 * @property DndMonstersubtype $monstersubtype
 * @property DndMonster $monster
 */
class DndMonsterSubtypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_monster_subtypes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'monster_id', 'monstersubtype_id'], 'required'],
            [['id', 'monster_id', 'monstersubtype_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'monster_id' => 'Monster ID',
            'monstersubtype_id' => 'Monstersubtype ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonstersubtype()
    {
        return $this->hasOne(DndMonstersubtype::className(), ['id' => 'monstersubtype_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonster()
    {
        return $this->hasOne(DndMonster::className(), ['id' => 'monster_id']);
    }
}
