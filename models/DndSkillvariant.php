<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_skillvariant".
 *
 * @property integer $id
 * @property integer $skill_id
 * @property integer $rulebook_id
 * @property integer $page
 * @property string $description
 * @property string $check
 * @property string $action
 * @property string $try_again
 * @property string $special
 * @property string $synergy
 * @property string $untrained
 * @property string $description_html
 * @property string $check_html
 * @property string $action_html
 * @property string $try_again_html
 * @property string $special_html
 * @property string $synergy_html
 * @property string $untrained_html
 * @property string $restriction
 * @property string $restriction_html
 *
 * @property DndRulebook $rulebook
 * @property DndSkill $skill
 */
class DndSkillvariant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_skillvariant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'skill_id', 'rulebook_id', 'description', 'check', 'action', 'try_again', 'special', 'synergy', 'untrained', 'description_html', 'check_html', 'action_html', 'try_again_html', 'special_html', 'synergy_html', 'untrained_html', 'restriction', 'restriction_html'], 'required'],
            [['id', 'skill_id', 'rulebook_id', 'page'], 'integer'],
            [['description', 'check', 'action', 'try_again', 'special', 'synergy', 'untrained', 'description_html', 'check_html', 'action_html', 'try_again_html', 'special_html', 'synergy_html', 'untrained_html', 'restriction', 'restriction_html'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'skill_id' => 'Skill ID',
            'rulebook_id' => 'Rulebook ID',
            'page' => 'Page',
            'description' => 'Description',
            'check' => 'Check',
            'action' => 'Action',
            'try_again' => 'Try Again',
            'special' => 'Special',
            'synergy' => 'Synergy',
            'untrained' => 'Untrained',
            'description_html' => 'Description Html',
            'check_html' => 'Check Html',
            'action_html' => 'Action Html',
            'try_again_html' => 'Try Again Html',
            'special_html' => 'Special Html',
            'synergy_html' => 'Synergy Html',
            'untrained_html' => 'Untrained Html',
            'restriction' => 'Restriction',
            'restriction_html' => 'Restriction Html',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRulebook()
    {
        return $this->hasOne(DndRulebook::className(), ['id' => 'rulebook_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkill()
    {
        return $this->hasOne(DndSkill::className(), ['id' => 'skill_id']);
    }
}
