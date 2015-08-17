<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_spelldomainlevel".
 *
 * @property integer $id
 * @property integer $domain_id
 * @property integer $spell_id
 * @property integer $level
 * @property string $extra
 *
 * @property DndDomain $domain
 * @property DndSpell $spell
 */
class DndSpelldomainlevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_spelldomainlevel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'domain_id', 'spell_id', 'level', 'extra'], 'required'],
            [['id', 'domain_id', 'spell_id', 'level'], 'integer'],
            [['extra'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domain_id' => 'Domain ID',
            'spell_id' => 'Spell ID',
            'level' => 'Level',
            'extra' => 'Extra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomain()
    {
        return $this->hasOne(DndDomain::className(), ['id' => 'domain_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpell()
    {
        return $this->hasOne(DndSpell::className(), ['id' => 'spell_id']);
    }
}
