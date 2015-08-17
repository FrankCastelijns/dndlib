<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_characterclassvariant_class_skills".
 *
 * @property integer $id
 * @property integer $characterclassvariant_id
 * @property integer $skill_id
 *
 * @property DndCharacterclassvariant $characterclassvariant
 * @property DndSkill $skill
 */
class DndCharacterclassvariantClassSkills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_characterclassvariant_class_skills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'characterclassvariant_id', 'skill_id'], 'required'],
            [['id', 'characterclassvariant_id', 'skill_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'characterclassvariant_id' => 'Characterclassvariant ID',
            'skill_id' => 'Skill ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacterclassvariant()
    {
        return $this->hasOne(DndCharacterclassvariant::className(), ['id' => 'characterclassvariant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkill()
    {
        return $this->hasOne(DndSkill::className(), ['id' => 'skill_id']);
    }
}
