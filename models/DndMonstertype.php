<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_monstertype".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 *
 * @property DndMonster[] $dndMonsters
 */
class DndMonstertype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_monstertype';
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
    public function getDndMonsters()
    {
        return $this->hasMany(DndMonster::className(), ['type_id' => 'id']);
    }
}
