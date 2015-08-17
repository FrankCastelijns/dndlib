<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_domain".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 *
 * @property DndDomainvariant[] $dndDomainvariants
 * @property DndSpelldomainlevel[] $dndSpelldomainlevels
 */
class DndDomain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_domain';
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
    public function getDndDomainvariants()
    {
        return $this->hasMany(DndDomainvariant::className(), ['domain_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndSpelldomainlevels()
    {
        return $this->hasMany(DndSpelldomainlevel::className(), ['domain_id' => 'id']);
    }
}
