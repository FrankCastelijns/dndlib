<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_monsterhasfeat".
 *
 * @property integer $id
 * @property integer $monster_id
 * @property integer $feat_id
 * @property string $extra
 *
 * @property DndFeat $feat
 * @property DndMonster $monster
 */
class DndMonsterhasfeat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_monsterhasfeat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'monster_id', 'feat_id', 'extra'], 'required'],
            [['id', 'monster_id', 'feat_id'], 'integer'],
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
            'feat_id' => 'Feat ID',
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
    public function getMonster()
    {
        return $this->hasOne(DndMonster::className(), ['id' => 'monster_id']);
    }
}
