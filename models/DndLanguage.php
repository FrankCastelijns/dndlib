<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_language".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $description_html
 *
 * @property DndRaceAutomaticLanguages[] $dndRaceAutomaticLanguages
 * @property DndRaceBonusLanguages[] $dndRaceBonusLanguages
 */
class DndLanguage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'slug', 'description', 'description_html'], 'required'],
            [['id'], 'integer'],
            [['description', 'description_html'], 'string'],
            [['name'], 'string', 'max' => 64],
            [['slug'], 'string', 'max' => 32]
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
            'description' => 'Description',
            'description_html' => 'Description Html',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndRaceAutomaticLanguages()
    {
        return $this->hasMany(DndRaceAutomaticLanguages::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndRaceBonusLanguages()
    {
        return $this->hasMany(DndRaceBonusLanguages::className(), ['language_id' => 'id']);
    }
}
