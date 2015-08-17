<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DndSpell */

$this->title = 'Create Dnd Spell';
$this->params['breadcrumbs'][] = ['label' => 'Dnd Spells', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dnd-spell-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
