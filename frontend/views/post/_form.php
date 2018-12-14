<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use common\models\Provice;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">
    <?php
    $city = \common\models\Provinces::find()->all();
    $listData = ArrayHelper::map($city, 'PROVINCE_ID', 'PROVINCE_NAME');
    $citys = \common\models\Category::find()->all();
    $listDatas = ArrayHelper::map($citys, 'id', 'name');
    ?>  
    <?php
    $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data']
    ]);
    ?>

<?= $form->field($model, 'category_id')->dropDownList($listDatas, ['prompt' => 'Choose...']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>



<?= $form->field($model, 'line_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line_add')->textInput(['maxlength' => true]) ?>



<?= $form->field($model, 'age')->textInput() ?>

<?= $form->field($model, 'province_id')->dropDownList($listData, ['prompt' => 'Choose...']); ?>

    <div class="row">
        <div class="col-md-2">
            <div class="well text-center">
            <?= Html::img($model->getPhotoViewer(), ['style' => 'width:100px;', 'class' => 'img-rounded']); ?>
            </div>
        </div>
        <div class="col-md-10">
        <?= $form->field($model, 'photo')->fileInput() ?>
        </div>
    </div>
    <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
