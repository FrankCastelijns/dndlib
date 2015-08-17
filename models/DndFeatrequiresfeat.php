<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_featrequiresfeat".
 *
 * @property integer $id
 * @property integer $source_feat_id
 * @property integer $required_feat_id
 * @property string $additional_text
 *
 * @property DndFeat $requiredFeat
 * @property DndFeat $sourceFeat
 */
class DndFeatrequiresfeat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_featrequiresfeat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'source_feat_id', 'required_feat_id', 'additional_text'], 'required'],
            [['id', 'source_feat_id', 'required_feat_id'], 'integer'],
            [['additional_text'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'source_feat_id' => 'Source Feat ID',
            'required_feat_id' => 'Required Feat ID',
            'additional_text' => 'Additional Text',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequiredFeat()
    {
        return $this->hasOne(DndFeat::className(), ['id' => 'required_feat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSourceFeat()
    {
        return $this->hasOne(DndFeat::className(), ['id' => 'source_feat_id']);
    }
}
