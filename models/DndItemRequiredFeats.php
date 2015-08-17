<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_item_required_feats".
 *
 * @property integer $id
 * @property integer $item_id
 * @property integer $feat_id
 *
 * @property DndFeat $feat
 * @property DndItem $item
 */
class DndItemRequiredFeats extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_item_required_feats';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'item_id', 'feat_id'], 'required'],
            [['id', 'item_id', 'feat_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(DndItem::className(), ['id' => 'item_id']);
    }
}
