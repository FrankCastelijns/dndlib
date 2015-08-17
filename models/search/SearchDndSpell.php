<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DndSpell;

/**
 * SearchDndSpell represents the model behind the search form about `app\models\DndSpell`.
 */
class SearchDndSpell extends DndSpell
{
    public $school;
    public $subSchool;
    public $descriptor;
    public $rulebook;
    public $classLevels;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'rulebook_id', 'page', 'school_id', 'sub_school_id', 'verbal_component', 'somatic_component', 'material_component', 'arcane_focus_component', 'divine_focus_component', 'xp_component', 'meta_breath_component', 'true_name_component', 'corrupt_component', 'corrupt_level', 'verified', 'verified_author_id'], 'integer'],
            [['added', 'name', 'casting_time', 'range', 'target', 'effect', 'area', 'duration', 'saving_throw', 'spell_resistance', 'description', 'slug', 'extra_components', 'description_html', 'verified_time','school','rulebook','subSchool','classLevels','descriptor'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DndSpell::find()->distinct()->with('dndSpellclasslevels.characterClass','dndSpelldomainlevels.domain','dndSpellDescriptors.spelldescriptor');

        $query->joinWith(['school','subSchool','rulebook','dndSpellclasslevels.characterClass','dndSpelldomainlevels.domain','dndSpellDescriptors.spelldescriptor']);
                
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['name'=>SORT_ASC]],
            'pagination' => [
                'pagesize' => 50,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $dataProvider->sort->attributes['school'] = [
            'asc' => ['school.name' => SORT_ASC],
            'desc' => ['school.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['subSchool'] = [
            'asc' => ['subSchool.name' => SORT_ASC],
            'desc' => ['subSchool.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['rulebook'] = [
            'asc' => ['rulebook.name' => SORT_ASC],
            'desc' => ['rulebook.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['classLevels'] = [
            'asc'=> ['dnd_spellclasslevel.level' => SORT_ASC],
            'desc' => ['dnd_spellclasslevel.level' =>SORT_DESC]
        ];
        $dataProvider->sort->attributes['descriptor'] = [
            'asc'=> ['dnd_spell_descriptors.spelldescriptor_id' => SORT_ASC],  
            'desc'=> ['dnd_spell_descriptors.spelldescriptor_id' => SORT_DESC], 
        ];

        $query->andFilterWhere([
            'id' => $this->id,
            'added' => $this->added,
            'rulebook_id' => $this->rulebook_id,
            'page' => $this->page,
            'school_id' => $this->school_id,
            'sub_school_id' => $this->sub_school_id,
            'verbal_component' => $this->verbal_component,
            'somatic_component' => $this->somatic_component,
            'material_component' => $this->material_component,
            'arcane_focus_component' => $this->arcane_focus_component,
            'divine_focus_component' => $this->divine_focus_component,
            'xp_component' => $this->xp_component,
            'meta_breath_component' => $this->meta_breath_component,
            'true_name_component' => $this->true_name_component,
            'corrupt_component' => $this->corrupt_component,
            'corrupt_level' => $this->corrupt_level,
            'verified' => $this->verified,
            'verified_author_id' => $this->verified_author_id,
            'verified_time' => $this->verified_time,
        ]);

        $query->andFilterWhere(['like', 'dnd_spell.name', $this->name])
            ->andFilterWhere(['like', 'casting_time', $this->casting_time])
            ->andFilterWhere(['like', 'range', $this->range])
            ->andFilterWhere(['like', 'target', $this->target])
            ->andFilterWhere(['like', 'effect', $this->effect])
            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['like', 'duration', $this->duration])
            ->andFilterWhere(['like', 'saving_throw', $this->saving_throw])
            ->andFilterWhere(['like', 'spell_resistance', $this->spell_resistance])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'extra_components', $this->extra_components])
            ->andFilterWhere(['like', 'description_html', $this->description_html])
            ->andFilterWhere(['like', 'dnd_spellschool.name',$this->school])
            ->andFilterWhere(['like', 'dnd_spellsubschool.name',$this->subSchool])
            ->andFilterWhere(['like', 'dnd_rulebook.name',$this->rulebook])
            ->andFilterWhere(['or',['like', 'dnd_characterclass.name',preg_replace('/[0-9]+/', '',$this->classLevels)],['like', 'dnd_domain.name',preg_replace('/[0-9]+/', '',$this->classLevels)]])
            ->andFilterWhere(['or',['like', 'dnd_spellclasslevel.level',preg_replace('/[^0-9]+/', '',$this->classLevels)],['like', 'dnd_spelldomainlevel.level',preg_replace('/[^0-9]+/', '',$this->classLevels)]])
            ->andFilterWhere(['like', 'dnd_spelldescriptor.name',$this->descriptor])
                ;
            

        return $dataProvider;
    }
}
