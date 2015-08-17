<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DndSpell */

$this->title = 'Update Dnd Spell: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dnd Spells', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dnd-spell-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
