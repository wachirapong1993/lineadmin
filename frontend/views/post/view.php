<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'options' => ['style' => 'width:150px;'],
                'format' => 'raw',
                'attribute' => 'photo',
                'value' => function($model) {
                    return Html::tag('div', '', [
                                'style' => 'width:150px;height:95px;
                          border-top: 10px solid rgba(255, 255, 255, .46);
                          background-image:url(' . $model->photoViewer . ');
                          background-size: cover;
                          background-position:center center;
                          background-repeat:no-repeat;
                          ']);
                }
            ],
            'id',
            'category_id',
            'name',
            'photo',
            'photos:ntext',
            'line_id',
            'line_add',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'age',
            'province_id',
        ],
    ])
    ?>

</div>
