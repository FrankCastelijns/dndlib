<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SearchDndSpell */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dnd Spells';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dnd-spell-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dnd Spell', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            // 'school_id',
            // 'sub_school_id',
            // 'verbal_component',
            // 'somatic_component',
            // 'material_component',
            // 'arcane_focus_component',
            // 'divine_focus_component',
            // 'xp_component',
            // 'casting_time',
            // 'range',
            // 'target',
            // 'effect',
            // 'area',
            // 'duration',
            // 'saving_throw',
            // 'spell_resistance',
            // 'description:ntext',
            ['attribute'=>'school','value'=>'school.name'],
            ['attribute'=>'subSchool','value'=>'subSchool.name'],
            ['attribute'=>'descriptor','value'=>'descriptors'],
            ['attribute'=>'rulebook','value'=>'rulebook.name'],
            ['attribute'=>'classLevels','value'=>'classandlevels'],
            // 'slug',
            // 'meta_breath_component',
            // 'true_name_component',
            // 'extra_components',
            // 'description_html:ntext',
            // 'corrupt_component',
            // 'corrupt_level',
            // 'verified',
            // 'verified_author_id',
            // 'verified_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
