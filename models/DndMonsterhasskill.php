<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_monsterhasskill".
 *
 * @property integer $id
 * @property integer $monster_id
 * @property integer $skill_id
 * @property integer $ranks
 * @property string $extra
 *
 * @property DndMonster $monster
 * @property DndSkill $skill
 */
class DndMonsterhasskill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_monsterhasskill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'monster_id', 'skill_id', 'ranks', 'extra'], 'required'],
            [['id', 'monster_id', 'skill_id', 'ranks'], 'integer'],
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
            'monster_id' => 'Monster ID',
            'skill_id' => 'Skill ID',
            'ranks' => 'Ranks',
            'extra' => 'Extra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonster()
    {
        return $this->hasOne(DndMonster::className(), ['id' => 'monster_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkill()
    {
        return $this->hasOne(DndSkill::className(), ['id' => 'skill_id']);
    }
}
