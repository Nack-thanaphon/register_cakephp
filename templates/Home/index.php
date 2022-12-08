<style>
    .mySwiper3 {
        width: 100%;
        overflow: hidden;
        height: 650px;
    }

    .swiper-slide>img {
        width: 100%;
        object-fit: contain;
    }

    .postsImg {
        position: relative;
        width: 100%;
        height: 180px;
        overflow: hidden;
    }

    .posts_type {
        position: absolute;
        top: 10px;
        left: 6px;
    }

    .map {
        width: 100%;
        height: 170px;
        overflow: hidden;
    }

    iframe {
        width: 100% !important;
        object-fit: contain;
    }

    @media screen and (max-width: 750px) {
        .mySwiper3 {
            width: 100%;
            overflow: hidden;
            height: 170px;
        }

        .postsImg {
            position: relative;
            width: 100%;
            height: 190px;
            overflow: hidden;
        }


    }

    @media screen and (max-width: 900px - 1024px) {
        .mySwiper3 {
            width: 100%;
            overflow: hidden;
            height: 400px;
        }

        .postsImg {
            position: relative;
            width: 100%;
            height: 180px;
            overflow: hidden;
        }


    }
</style>

<?php $this->assign('title', 'หน้าหลัก'); ?>
<div class="container">
    <div class="row  m-0 p-0 mb-4">
        <div class="swiper mySwiper3 px-sm-2 ">
            <div class="swiper-wrapper rounded">
                <div class="swiper-slide ">
                    <img class="" src="<?= $this->Url->image("mainbanner.png") ?>">
                </div>
                <div class="swiper-slide ">
                    <img class="" src="<?= $this->Url->image("91689392_2966188953437431_3585391548549824512_n.jpg") ?>">
                </div>
                <div class="swiper-slide ">
                    <img class="" src="<?= $this->Url->image("174070815_4020892831300366_8612633571049325923_n.jpg") ?>">
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>

    </div>


    <div class="row m-0 p-0 d-sm-flex justify-content-between d-none ">
        <!-- bg-desktop -->
        <div class="col-12 col-sm-6  m-0">
            <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'aboutus', 'action' => 'ourbranch']) ?>" class="row m-0 d-flex justify-content-between  bg-success p-4 rounded mb-2 border shadow-sm">
                <div class="m-0 p-0 col-7 my-auto">
                    <h4>สาขาทั้งหมด</h4>
                    <h1 style="font-size:4rem ;">20 สาขา </h1>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6  m-0">
            <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'products', 'action' => 'index']) ?>" class="row m-0 d-flex justify-content-between  bg-white p-4 rounded mb-2 border  shadow-sm">
                <div class="col-7 my-auto">
                    <h4>เมนูทั้งหมด</h4>
                    <h1 class="text-success" style="font-size:4rem ;">10 เมนู </h1>
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
                    <h1 class=" m-0 p-0" style="font-size:2rem ;">20 สาขา </h1>
                </div>
            </a>
        </div>
        <div class="col-6 col-sm-6  m-0">
            <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'products', 'action' => 'index']) ?>" class="row m-0 d-flex justify-content-between  bg-white p-2 rounded mb-2 border  shadow-sm">
                <div class="col-12 my-auto p-0 m-0">
                    <h6>เมนูทั้งหมด</h6>
                    <h1 class="text-success m-0 p-0" style="font-size:2rem ;">10 เมนู </h1>
                </div>
            </a>
        </div>
    </div>
    <div class="row my-4  m-0 p-0 d-flex justify-content-between">

        <div class="col-12  py-3 p-2 h-100  text-start  mb-2">
            <h1 class="text-success m-0 p-0" style="font-size:3rem ;">สาขา</h1>
        </div>
        <div class="col-12  m-0">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php foreach ($Branch as $key => $value) : ?>
                        <div class="card m-1 p-2 col-12 col-sm-4   swiper-slide ">

                            <!-- Desktop -->
                            <div class="card-body p-1 d-sm-block d-none ">
                                <h5 class="m-0 p-0 text-left col-12 text-truncate"><?= $value->b_name ?></h5>
                                <div class="text-left m-0 p-0">
                                    <p class="text-muted mt-1 m-0 ">จังหวัด : <span class="text-success"><?= $value->b_province ?></span></p>
                                    <p class="text-muted  m-0 p-0">เบอร์โทร : <?= $value->b_phone ?></p>
                                    <a href="<?= $value->b_link ?>" id="mb_link" target="blank">
                                        <small class="m-0 p-0 text-muted"><i class="fas fa-map-pin text-danger"></i> ไปที่ร้านค้า</small>
                                    </a>
                                    <div class="map "><?= $value->b_map ?></div>
                                </div>
                            </div>
                            <!-- Mobile -->
                            <div class="card-body p-1 d-sm-none d-block ">
                                <p class="m-0 p-0 text-left col-12 text-truncate"><?= $value->b_name ?></p>
                                <div class="text-left m-0 p-0">
                                    <h6 class="text-muted mt-1 m-0 col-12">จังหวัด : <span class="text-success"><?= $value->b_province ?></span></h6>
                                    <p class="text-muted  m-0 p-0">เบอร์โทร : <?= $value->b_phone ?></p>
                                    <a href="<?= $value->b_link ?>" id="mb_link" target="blank">
                                        <small class="m-0 p-0 text-muted"><i class="fas fa-map-pin text-danger"></i> ไปที่ร้านค้า</small>
                                    </a>
                                    <div class="map "><?= $value->b_map ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="text-right my-2 ">
                <a class="text-muted" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'aboutus', 'action' => 'branch']) ?>">อ่านทั้งหมด</a>
            </div>
        </div>

    </div>

    <div class="row my-4  m-0 p-0 py-sm-5">
        <div class="col-12  py-3 p-2 h-100  text-start  mb-2">
            <h1 class="text-success m-0 p-0" style="font-size:3rem ;">สินค้า</h1>
        </div>
        <div class="col-12  m-0">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php foreach ($data as $key => $value) : ?>
                        <div class="card m-1 p-2 col-12 col-sm-4   swiper-slide ">
                            <div class="postsImg">
                                <small class="text-muted posts_type badge badge-pill badge-success text-white m-0 "><?= $value->type ?></small>
                                <img class=" w-100 " src="<?= $this->Url->build($value->image); ?>" alt="<?= $value->title ?>">
                            </div>
                            <div class="card-body m-0 p-2">
                                <h5 class="col-12 text-truncate my-1 m-0 p-0"><?= $value->title ?></h5>
                                <div class="text-right m-0 ">
                                    <h5 class="text-success mt-1 m-0 p-0 "><?= $value->price ?> บาท/ชิ้น </h5>
                                    <small class="text-muted text-right m-0 p-0">ในคลัง <?= $value->total ?> ชิ้น</small>
                                    <div class="row mt-3 m-0 p-0 d-flex justify-content-between">
                                        <div class="col-2 m-0 p-0">
                                            <a href="https://line.me/R/oaMessage/<?= $contactData->lineofcial; ?>?สอบถามสินค้า<?= $value->title ?>" target="blank" class="btn btn m-0 p-0 w-100 ">
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
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
            <div class="text-right my-2 ">
                <a class="text-muted" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'products', 'action' => 'index']) ?>">อ่านทั้งหมด</a>
            </div>
        </div>
    </div>

    <div class="row my-4  m-0 p-0 py-sm-5">
        <div class="col-12  py-3 p-2 h-100 text-sm-center text-start  mb-2">
            <h1 class="text-success m-0 p-0" style="font-size:3rem ;">บทความ</h1>
        </div>
        <div class="col-12  m-0">
            <div class="row m-0 p-0 mb-3">
                <div class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        <?php foreach ($posts as $key => $post) : ?>
                            <div class="col-12 col-sm-4 py-2 swiper-slide h-100">
                                <div class="card ">
                                    <div class="postsImg ">
                                        <small class="text-muted posts_type badge badge-pill badge-success text-white m-0 "><?= $post->type ?></small>
                                        <img class="d-block w-100 " src="<?= $this->Url->build($post->image); ?>" alt="<?= $post->p_title ?>">
                                    </div>
                                    <div class="my-2 p-3">
                                        <h5 class="col-12 text-truncate my-1 m-0 p-0"><?= $post->title ?></h5>
                                        <p class="m-0 mt-3"><?= $post->user ?></p>
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
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="text-right my-2 ">
                <a class="text-muted" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'posts', 'action' => 'index']) ?>">อ่านทั้งหมด</a>
            </div>
        </div>
    </div>
</div>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        lazy: true,
        spaceBetween: 30,
        freeMode: true,
        autoplay: {
            delay: 5000,
        },

        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 50,
            },
        },
    });
    var swiper = new Swiper(".mySwiper2", {
        effect: "coverflow",
        lazy: true,
        grabCursor: true,
        centeredSlides: true,
        autoplay: {
            delay: 7000,
        },
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
    });
    var swiper = new Swiper(".mySwiper3", {
        spaceBetween: 30,
        lazy: true,
        autoplay: {
            delay: 7000,
        },

    });
</script>