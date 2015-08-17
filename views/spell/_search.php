<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\SearchDndSpell */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dnd-spell-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'added') ?>

    <?= $form->field($model, 'rulebook_id') ?>

    <?= $form->field($model, 'page') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'school_id') ?>

    <?php // echo $form->field($model, 'sub_school_id') ?>

    <?php // echo $form->field($model, 'verbal_component') ?>

    <?php // echo $form->field($model, 'somatic_component') ?>

    <?php // echo $form->field($model, 'material_component') ?>

    <?php // echo $form->field($model, 'arcane_focus_component') ?>

    <?php // echo $form->field($model, 'divine_focus_component') ?>

    <?php // echo $form->field($model, 'xp_component') ?>

    <?php // echo $form->field($model, 'casting_time') ?>

    <?php // echo $form->field($model, 'range') ?>

    <?php // echo $form->field($model, 'target') ?>

    <?php // echo $form->field($model, 'effect') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'saving_throw') ?>

    <?php // echo $form->field($model, 'spell_resistance') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'meta_breath_component') ?>

    <?php // echo $form->field($model, 'true_name_component') ?>

    <?php // echo $form->field($model, 'extra_components') ?>

    <?php // echo $form->field($model, 'description_html') ?>

    <?php // echo $form->field($model, 'corrupt_component') ?>

    <?php // echo $form->field($model, 'corrupt_level') ?>

    <?php // echo $form->field($model, 'verified') ?>

    <?php // echo $form->field($model, 'verified_author_id') ?>

    <?php // echo $form->field($model, 'verified_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
