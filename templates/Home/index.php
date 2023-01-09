<style>
    .p_img {
        width: 100%;
        object-fit: cover;
        height: 290px;
    }


    .post_img {
        object-fit: cover;
        height: 160px;
    }

    .map {
        width: 100%;
        height: 170px;
    }

    iframe {
        width: 100% !important;
        object-fit: contain;
    }

    @media screen and (max-width: 750px) {


        .post_img {
            height: 100%;
            /* overflow: hidden; */
        }


    }
</style>

<?php $this->assign('title', 'หน้าหลัก'); ?>
<div class="container">
    <div class="col-12 m-0 p-0 m-sm-1">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?= $this->Url->image("mainbanner2.jpg") ?>" style="height: 350px;object-fit: cover;" alt="แม่ปลูกลูกขาย">
                </div>
                <!-- <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Third slide">
            </div> -->
            </div>
        </div>
    </div>
  


    <div class="row m-0 p-0 d-sm-flex justify-content-between d-none ">
        <!-- bg-desktop -->
        <div class="col-12 col-sm-6  m-0">
            <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'aboutus', 'action' => 'ourbranch']) ?>" class="row m-0 d-flex justify-content-between  bg-success p-4 rounded mb-2 border shadow-sm">
                <div class="m-0 p-0 col-7 my-auto">
                    <h4>สาขาทั้งหมด</h4>
                    <h1 style="font-size:4rem ;"><?= $this->Custom->CountBranch() ?> สาขา </h1>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6  m-0">
            <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'products', 'action' => 'index']) ?>" class="row m-0 d-flex justify-content-between  bg-white p-4 rounded mb-2 border  shadow-sm">
                <div class="col-7 my-auto">
                    <h4>สินค้าทั้งหมด</h4>
                    <h1 class="text-success" style="font-size:4rem ;"><?= $this->Custom->CountProducts() ?> รายการ </h1>
                </div>
            </a>
        </div>
    </div>


    <!-- bg-mobile -->

    <div class="row  my-4 p-0 m-0   d-flex d-sm-none d-md-none d-lg-none">
        <div class="col-6 col-sm-6  m-0">
            <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'aboutus', 'action' => 'ourbranch']) ?>" class="row m-0 d-flex justify-content-between  bg-success p-2 rounded mb-2 border shadow-sm">
                <div class="col-12 my-auto p-0 m-0">
                    <h6>สาขาทั้งหมด</h6>
                    <h1 class=" m-0 p-0" style="font-size:2rem ;"><?= $this->Custom->CountBranch() ?> สาขา </h1>
                </div>
            </a>
        </div>
        <div class="col-6 col-sm-6  m-0">
            <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'products', 'action' => 'index']) ?>" class="row m-0 d-flex justify-content-between  bg-white p-2 rounded mb-2 border  shadow-sm">
                <div class="col-12 my-auto p-0 m-0">
                    <h6>สินค้าทั้งหมด</h6>
                    <h1 class="text-success m-0 p-0" style="font-size:2rem ;"><?= $this->Custom->CountProducts() ?> รายการ </h1>
                </div>
            </a>
        </div>
    </div>
    <div class="row my-4  m-0 p-0 d-flex justify-content-between">

        <div class="col-12  py-3 p-2 h-100  text-start  mb-2">
            <h1 class="text-success m-0 p-0" style="font-size:3rem ;">สาขา</h1>
        </div>
        <div class="col-12  m-0">
            <div class="row m-0 p-0">
                <?php foreach ($Branch as $key => $value) : ?>
                    <div class=" m-0 p-0 col-12 col-sm-4  ">
                        <!-- Desktop -->
                        <div class="card p-2 m-1">
                            <div class="card-body p-1  h-100">
                                <h5 class="m-0 p-0 text-left col-12 text-truncate"><?= $value->b_name ?></h5>
                                <hr>
                                <p class="text-muted mt-1 m-0 ">จังหวัด : <span class="text-success"><?= $value->b_province ?></span></p>
                                <p class="text-muted  m-0 p-0">เบอร์โทร : <?= $value->b_phone ?></p>
                                <a href="<?= $value->b_link ?>" id="mb_link" target="blank">
                                    <p class="m-0 p-0 mt-3"> ไปที่ร้านค้า</p>
                                </a>
                                <!-- <div class=" w-100 mt-3"><?= $value->b_map ?></div> -->
                            </div>
                        </div>
                        <!-- Mobile -->
                    </div>

                <?php endforeach; ?>
            </div>
            <div class="text-right my-2 ">
                <a class="text-muted" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'aboutus', 'action' => 'ourbranch']) ?>">อ่านทั้งหมด</a>
            </div>
        </div>

    </div>

    <div class="row my-4  m-0 p-0 py-sm-5">
        <div class="col-12  py-3 p-2 h-100  text-start  mb-2">
            <h1 class="text-success m-0 p-0" style="font-size:3rem ;">สินค้า</h1>
        </div>
        <div class="col-12  m-0 p-0 ">
            <div class="row m-0 p-0">
                <?php foreach ($data as $key => $value) : ?>
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                        <div class="card">
                            <img class="card-img p_img" src="<?= $this->Url->build($value->image); ?>" alt="<?= $value->title ?>">
                            <!-- <div class="card-img-overlay d-flex justify-content-end">
                                <a href="#" class="card-link text-danger like">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </div> -->
                            <div class="card-body">
                                <h4 class=""><?= $value->title ?></h4>
                                <h6 class="card-subtitle mb-2 text-muted">ชนิด : <?= $value->type ?></h6>
                                <p class="card-text">
                                    <?= $value->detail ?>
                                <div class="buy d-flex justify-content-between align-items-center">
                                    <div class="price text-success">
                                        <h5 class="mt-4"><i class="fa-solid fa-baht-sign"></i><?= $value->price ?></h5>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="https://line.me/R/oaMessage/<?= $contactData->lineoficial; ?>?สอบถามสินค้า<?= $value->title ?>" target="blank" type="button" class="btn btn-success  mt-3"> <i class="fab fa-line  text-white"></i></a>
                                        <a href=" <?= $this->Url->build([
                                                        'controller' => 'products',
                                                        'action' => 'view',
                                                        $value->id,
                                                        'slug' => $value->title
                                                    ]) ?>" type="button" class="btn btn-success mt-3">รายละเอียดสินค้า</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <small class="text-muted posts_type badge badge-pill badge-success text-white m-0 "><?= $value->type ?></small>
                            <img class=" w-100 " src="<?= $this->Url->build($value->image); ?>" alt="<?= $value->title ?>">

                            <div class="card-body m-0 p-2">
                                <h5 class="col-12 text-truncate my-1 m-0 p-0"><?= $value->title ?></h5>
                                <div class="text-right m-0 ">
                                    <h5 class="text-success mt-1 m-0 p-0 "><?= $value->price ?> บาท/ชิ้น </h5>
                                    <small class="text-muted text-right m-0 p-0">ในคลัง <?= $value->total ?> ชิ้น</small>
                                    <div class="row mt-3 m-0 p-0 d-flex justify-content-between">
                                        <div class="col-2 m-0 p-0">
                                            <a href="https://line.me/R/oaMessage/<?= $contactData->lineoficial; ?>?สอบถามสินค้า<?= $value->title ?>" target="blank" class="btn btn m-0 p-0 w-100 ">
                                                <h5 class="fab fa-line text-success m-0 p-0"></h5>
                                            </a>
                                        </div>
                                        <div class="col-9 m-0 p-0 my-auto">
                                            <a class="btn btn-white m-0 p-0  w-100 " href="
                                                <?= $this->Url->build([
                                                    'controller' => 'products',
                                                    'action' => 'view',
                                                    $value->id,
                                                    'slug' => $value->title
                                                ]) ?>">
                                                <small class="m-0 p-0"><i class="fas fa-link"></i> รายละเอียดสินค้า</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                <?php endforeach; ?>
            </div>
            <!-- <div class="swiper-pagination"></div> -->

            <div class="text-right my-2 ">
                <a class="text-muted" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'products', 'action' => 'index']) ?>">อ่านทั้งหมด</a>
            </div>
        </div>
    </div>

    <div class="row my-4  m-0 p-0 py-sm-5">
        <div class="col-12  py-3 p-2 h-100  text-start  mb-2">
            <h1 class="text-success m-0 p-0" style="font-size:3rem ;">บทความ</h1>
        </div>
        <div class="col-12  m-0 p-0">
            <div class="row m-0 p-0 mb-3">
                <?php foreach ($posts as $key => $post) : ?>
                    <div class="col-12 col-sm-6 mb-4  ">
                        <div class="row  m-0 p-0 shadow-sm">
                            <div class="col-sm-6 col-12 my-2 m-sm-0 p-0">
                                <img class=" post_img w-100 my-auto " src="<?= $this->Url->build($post->image); ?>" alt="<?= $post->p_title ?>">
                            </div>
                            <div class="col-sm-6 col-12  m-sm-0">
                                <div class="my-2">
                                    <small class="text-muted  badge badge-pill badge-success text-white "><?= $post->type ?></small>
                                    <h6 class="col-12 text-truncate p-0 my-2"><?= $post->title ?></h6>
                                    <div class="mt-2">
                                        <hr class="m-0 p-0">
                                        <p class="m-0 mt-1 p-0"><?= $post->user ?></p>
                                        <small class="text-muted"><i class="fas fa-clock"></i> <?= $post->date ?></small> <br>
                                        <?php
                                        echo $this->Html->link('อ่านต่อ..', [
                                            'controller' => 'posts',
                                            'action' => 'view',
                                            $post->id,
                                            'slug' => $post->title
                                        ]);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="text-right my-2 ">
                <a class="text-muted" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'posts', 'action' => 'index']) ?>">อ่านทั้งหมด</a>
            </div>
        </div>
    </div>
</div>