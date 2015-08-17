<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_featspecialfeatprerequisite".
 *
 * @property integer $id
 * @property integer $feat_id
 * @property integer $special_feat_prerequisite_id
 * @property string $value_1
 * @property string $value_2
 *
 * @property DndFeat $feat
 * @property DndSpecialfeatprerequisite $specialFeatPrerequisite
 */
class DndFeatspecialfeatprerequisite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_featspecialfeatprerequisite';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'feat_id', 'special_feat_prerequisite_id', 'value_1', 'value_2'], 'required'],
            [['id', 'feat_id', 'special_feat_prerequisite_id'], 'integer'],
            [['value_1', 'value_2'], 'string', 'max' => 256]
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
            'special_feat_prerequisite_id' => 'Special Feat Prerequisite ID',
            'value_1' => 'Value 1',
            'value_2' => 'Value 2',
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
    public function getSpecialFeatPrerequisite()
    {
        return $this->hasOne(DndSpecialfeatprerequisite::className(), ['id' => 'special_feat_prerequisite_id']);
    }
}
