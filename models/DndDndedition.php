<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_dndedition".
 *
 * @property integer $id
 * @property string $name
 * @property string $system
 * @property string $slug
 * @property integer $core
 *
 * @property DndRulebook[] $dndRulebooks
 */
class DndDndedition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_dndedition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'system', 'slug', 'core'], 'required'],
            [['id', 'core'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 32],
            [['system'], 'string', 'max' => 16]
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
            'system' => 'System',
            'slug' => 'Slug',
            'core' => 'Core',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndRulebooks()
    {
        return $this->hasMany(DndRulebook::className(), ['dnd_edition_id' => 'id']);
    }
}
