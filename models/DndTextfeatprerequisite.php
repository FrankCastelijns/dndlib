<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_textfeatprerequisite".
 *
 * @property integer $id
 * @property string $text
 * @property integer $feat_id
 *
 * @property DndFeat $feat
 */
class DndTextfeatprerequisite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_textfeatprerequisite';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'text', 'feat_id'], 'required'],
            [['id', 'feat_id'], 'integer'],
            [['text'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'feat_id' => 'Feat ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeat()
    {
        return $this->hasOne(DndFeat::className(), ['id' => 'feat_id']);
    }
}
