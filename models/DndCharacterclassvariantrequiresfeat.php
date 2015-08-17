<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_characterclassvariantrequiresfeat".
 *
 * @property integer $id
 * @property integer $character_class_variant_id
 * @property integer $feat_id
 * @property string $extra
 * @property string $text_before
 * @property string $text_after
 * @property integer $remove_comma
 *
 * @property DndCharacterclassvariant $characterClassVariant
 * @property DndFeat $feat
 */
class DndCharacterclassvariantrequiresfeat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_characterclassvariantrequiresfeat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'character_class_variant_id', 'feat_id', 'extra', 'text_before', 'text_after', 'remove_comma'], 'required'],
            [['id', 'character_class_variant_id', 'feat_id', 'remove_comma'], 'integer'],
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
            'feat_id' => 'Feat ID',
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
    public function getFeat()
    {
        return $this->hasOne(DndFeat::className(), ['id' => 'feat_id']);
    }
}
