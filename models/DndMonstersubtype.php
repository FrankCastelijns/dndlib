<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_monstersubtype".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 *
 * @property DndMonsterSubtypes[] $dndMonsterSubtypes
 */
class DndMonstersubtype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_monstersubtype';
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
    public function getDndMonsterSubtypes()
    {
        return $this->hasMany(DndMonsterSubtypes::className(), ['monstersubtype_id' => 'id']);
    }
}
