<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DndSpell */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dnd Spells', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dnd-spell-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'added',
            'rulebook_id',
            'page',
            'name',
            'school_id',
            'sub_school_id',
            'verbal_component',
            'somatic_component',
            'material_component',
            'arcane_focus_component',
            'divine_focus_component',
            'xp_component',
            'casting_time',
            'range',
            'target',
            'effect',
            'area',
            'duration',
            'saving_throw',
            'spell_resistance',
            'description:ntext',
            'slug',
            'meta_breath_component',
            'true_name_component',
            'extra_components',
            'description_html:ntext',
            'corrupt_component',
            'corrupt_level',
            'verified',
            'verified_author_id',
            'verified_time',
        ],
    ]) ?>

</div>
