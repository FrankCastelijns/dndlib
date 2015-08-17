<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_race_automatic_languages".
 *
 * @property integer $id
 * @property integer $race_id
 * @property integer $language_id
 *
 * @property DndLanguage $language
 * @property DndRace $race
 */
class DndRaceAutomaticLanguages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_race_automatic_languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'race_id', 'language_id'], 'required'],
            [['id', 'race_id', 'language_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'race_id' => 'Race ID',
            'language_id' => 'Language ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(DndLanguage::className(), ['id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRace()
    {
        return $this->hasOne(DndRace::className(), ['id' => 'race_id']);
    }
}
