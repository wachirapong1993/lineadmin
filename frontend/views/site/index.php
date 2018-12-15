<?php
/*Test Git*/
/*From lineadmin*/
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">Shop Name</h1>
            <div class="list-group">
                <a href="#" class="list-group-item">Category 1</a>
                <a href="#" class="list-group-item">Category 2</a>
                <a href="#" class="list-group-item">Category 3</a>
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="row">
                  <?php foreach ($model as $data) : ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="<?= Yii::getAlias('@web') . '/uploads/' . $data->photo ?>" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">ชื่อ : <?= $data->name ?></a>
                            </h4>
                            <h5>อายุ : <?= $data->age ?></h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>
                    </div>
                </div>

               <?php endforeach; ?>
              

               

            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->

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

                        <p><a href="https://line.me/R/ti/p/~<?= $data->line_id ?>
                              "><img height="36" border="0" alt="Add friend" src="https://scdn.line-apps.com/n/line_add_friends/btn/en.png"></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>