<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_characterclassvariantrequiresrace".
 *
 * @property integer $id
 * @property integer $character_class_variant_id
 * @property integer $race_id
 * @property string $extra
 * @property string $text_before
 * @property string $text_after
 * @property integer $remove_comma
 *
 * @property DndCharacterclassvariant $characterClassVariant
 * @property DndRace $race
 */
class DndCharacterclassvariantrequiresrace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_characterclassvariantrequiresrace';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'character_class_variant_id', 'race_id', 'extra', 'text_before', 'text_after', 'remove_comma'], 'required'],
            [['id', 'character_class_variant_id', 'race_id', 'remove_comma'], 'integer'],
            [['extra'], 'string', 'max' => 32],
            [['text_before', 'text_after'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'character_class_variant_id' => 'Character Class Variant ID',
            'race_id' => 'Race ID',
            'extra' => 'Extra',
            'text_before' => 'Text Before',
            'text_after' => 'Text After',
            'remove_comma' => 'Remove Comma',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacterClassVariant()
    {
        return $this->hasOne(DndCharacterclassvariant::className(), ['id' => 'character_class_variant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRace()
    {
        return $this->hasOne(DndRace::className(), ['id' => 'race_id']);
    }
}
