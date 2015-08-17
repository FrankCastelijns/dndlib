<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_domainvariant".
 *
 * @property integer $id
 * @property integer $domain_id
 * @property integer $rulebook_id
 * @property integer $page
 * @property string $requirement
 * @property string $granted_power
 * @property string $granted_power_html
 * @property string $granted_power_type
 * @property string $deities_text
 *
 * @property DndDomain $domain
 * @property DndRulebook $rulebook
 * @property DndDomainvariantDeities[] $dndDomainvariantDeities
 * @property DndDomainvariantOtherDeities[] $dndDomainvariantOtherDeities
 */
class DndDomainvariant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_domainvariant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'domain_id', 'rulebook_id', 'requirement', 'granted_power', 'granted_power_html', 'granted_power_type', 'deities_text'], 'required'],
            [['id', 'domain_id', 'rulebook_id', 'page'], 'integer'],
            [['granted_power', 'granted_power_html'], 'string'],
            [['requirement'], 'string', 'max' => 64],
            [['granted_power_type'], 'string', 'max' => 8],
            [['deities_text'], 'string', 'max' => 128]
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
            'rulebook_id' => 'Rulebook ID',
            'page' => 'Page',
            'requirement' => 'Requirement',
            'granted_power' => 'Granted Power',
            'granted_power_html' => 'Granted Power Html',
            'granted_power_type' => 'Granted Power Type',
            'deities_text' => 'Deities Text',
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
    public function getRulebook()
    {
        return $this->hasOne(DndRulebook::className(), ['id' => 'rulebook_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndDomainvariantDeities()
    {
        return $this->hasMany(DndDomainvariantDeities::className(), ['domainvariant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDndDomainvariantOtherDeities()
    {
        return $this->hasMany(DndDomainvariantOtherDeities::className(), ['domainvariant_id' => 'id']);
    }
}
