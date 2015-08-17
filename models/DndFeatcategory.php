<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_featcategory".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 *
 * @property DndFeatFeatCategories[] $dndFeatFeatCategories
 */
class DndFeatcategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_featcategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'slug'], 'required'],
            [['id'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndFeatFeatCategories()
    {
        return $this->hasMany(DndFeatFeatCategories::className(), ['featcategory_id' => 'id']);
    }
}
