<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_spelldescriptor".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 *
 * @property DndSpellDescriptors[] $dndSpellDescriptors
 */
class DndSpelldescriptor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_spelldescriptor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'slug'], 'required'],
            [['id'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 64]
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
    public function getDndSpellDescriptors()
    {
        return $this->hasMany(DndSpellDescriptors::className(), ['spelldescriptor_id' => 'id']);
    }
}
