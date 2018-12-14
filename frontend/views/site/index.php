<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="row">
        <?php foreach ($model as $data) : ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">

                    <img src="<?= Yii::getAlias('@web') . '/uploads/' . $data->photo ?>" width="250px;" height="250px;">   
                    <div class="caption">
                        <h3>ชื่อ : <?= $data->name ?></h3>
                        <h5>อายุ : <?= $data->age ?></h5>
                        <p>...</p>

                        <p><a href="https://line.me/R/ti/p/~<?= $data->line_id?>
                              "><img height="36" border="0" alt="Add friend" src="https://scdn.line-apps.com/n/line_add_friends/btn/en.png"></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>