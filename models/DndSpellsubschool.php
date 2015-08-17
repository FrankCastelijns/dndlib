<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_spellsubschool".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 *
 * @property DndSpell[] $dndSpells
 */
class DndSpellsubschool extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_spellsubschool';
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
    public function getDndSpells()
    {
        return $this->hasMany(DndSpell::className(), ['sub_school_id' => 'id']);
    }
}
