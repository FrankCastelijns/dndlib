<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_specialfeatprerequisite".
 *
 * @property integer $id
 * @property string $name
 * @property string $print_format
 *
 * @property DndFeatspecialfeatprerequisite[] $dndFeatspecialfeatprerequisites
 */
class DndSpecialfeatprerequisite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_specialfeatprerequisite';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'print_format'], 'required'],
            [['id'], 'integer'],
            [['name', 'print_format'], 'string', 'max' => 64]
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
            'print_format' => 'Print Format',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndFeatspecialfeatprerequisites()
    {
        return $this->hasMany(DndFeatspecialfeatprerequisite::className(), ['special_feat_prerequisite_id' => 'id']);
    }
}
