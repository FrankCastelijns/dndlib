<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_feat_feat_categories".
 *
 * @property integer $id
 * @property integer $feat_id
 * @property integer $featcategory_id
 *
 * @property DndFeatcategory $featcategory
 * @property DndFeat $feat
 */
class DndFeatFeatCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_feat_feat_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'feat_id', 'featcategory_id'], 'required'],
            [['id', 'feat_id', 'featcategory_id'], 'integer']
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
            'featcategory_id' => 'Featcategory ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeatcategory()
    {
        return $this->hasOne(DndFeatcategory::className(), ['id' => 'featcategory_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeat()
    {
        return $this->hasOne(DndFeat::className(), ['id' => 'feat_id']);
    }
}
