<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DndSpell */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dnd-spell-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'added')->textInput() ?>

    <?= $form->field($model, 'rulebook_id')->textInput() ?>

    <?= $form->field($model, 'page')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_id')->textInput() ?>

    <?= $form->field($model, 'sub_school_id')->textInput() ?>

    <?= $form->field($model, 'verbal_component')->textInput() ?>

    <?= $form->field($model, 'somatic_component')->textInput() ?>

    <?= $form->field($model, 'material_component')->textInput() ?>

    <?= $form->field($model, 'arcane_focus_component')->textInput() ?>

    <?= $form->field($model, 'divine_focus_component')->textInput() ?>

    <?= $form->field($model, 'xp_component')->textInput() ?>

    <?= $form->field($model, 'casting_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'range')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'target')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'effect')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duration')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saving_throw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spell_resistance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_breath_component')->textInput() ?>

    <?= $form->field($model, 'true_name_component')->textInput() ?>

    <?= $form->field($model, 'extra_components')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_html')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'corrupt_component')->textInput() ?>

    <?= $form->field($model, 'corrupt_level')->textInput() ?>

    <?= $form->field($model, 'verified')->textInput() ?>

    <?= $form->field($model, 'verified_author_id')->textInput() ?>

    <?= $form->field($model, 'verified_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
