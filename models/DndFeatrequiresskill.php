<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_featrequiresskill".
 *
 * @property integer $id
 * @property integer $feat_id
 * @property integer $skill_id
 * @property integer $min_rank
 * @property string $extra
 *
 * @property DndFeat $feat
 * @property DndSkill $skill
 */
class DndFeatrequiresskill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_featrequiresskill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'feat_id', 'skill_id', 'min_rank', 'extra'], 'required'],
            [['id', 'feat_id', 'skill_id', 'min_rank'], 'integer'],
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
            'feat_id' => 'Feat ID',
            'skill_id' => 'Skill ID',
            'min_rank' => 'Min Rank',
            'extra' => 'Extra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeat()
    {
        return $this->hasOne(DndFeat::className(), ['id' => 'feat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkill()
    {
        return $this->hasOne(DndSkill::className(), ['id' => 'skill_id']);
    }
}
