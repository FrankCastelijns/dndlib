<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dnd_domainvariant_deities".
 *
 * @property integer $id
 * @property integer $domainvariant_id
 * @property integer $deity_id
 *
 * @property DndDeity $deity
 * @property DndDomainvariant $domainvariant
 */
class DndDomainvariantDeities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnd_domainvariant_deities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'domainvariant_id', 'deity_id'], 'required'],
            [['id', 'domainvariant_id', 'deity_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domainvariant_id' => 'Domainvariant ID',
            'deity_id' => 'Deity ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeity()
    {
        return $this->hasOne(DndDeity::className(), ['id' => 'deity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomainvariant()
    {
        return $this->hasOne(DndDomainvariant::className(), ['id' => 'domainvariant_id']);
    }
}
