<div class="row m-sm-5 m-0 p-0 p-sm-5 mb-4">
    <div class="carousel slide my-3" data-ride="carousel">
        <div class="carousel-inner " id="main_slider">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?= $this->Url->image("mainbanner.png") ?>">
            </div>
        </div>
        <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#banner" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>


<div class="row m-sm-5 m-0 p-0 p-sm-5 d-sm-flex justify-content-between d-none ">
    <!-- bg-desktop -->
    <div class="col-12 col-sm-6  m-0">
        <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'aboutus', 'action' => 'ourbranch']) ?>" class="row m-0 d-flex justify-content-between  bg-success p-4 rounded mb-2 border shadow-sm">
            <div class=" col-4 mx-auto w-100">
                <i class="fas fa-store" style="font-size:7rem ;"></i>
            </div>
            <div class="col-7 my-auto">
                <h4>สาขาทั้งหมด</h4>
                <h1 style="font-size:4rem ;">20 สาขา </h1>
            </div>
        </a>
    </div>
    <div class="col-12 col-sm-6  m-0">
        <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'products', 'action' => 'index']) ?>" class="row m-0 d-flex justify-content-between  bg-white p-4 rounded mb-2 border  shadow-sm">
            <div class=" col-4 mx-auto w-100">
                <i class="fas fa-utensils" style="font-size:7rem ;"></i>
            </div>
            <div class="col-7 my-auto">
                <h4>เมนูทั้งหมด</h4>
                <h1 class="text-success" style="font-size:4rem ;">10 เมนู </h1>
            </div>
        </a>
    </div>
</div>


<!-- bg-mobile -->

<div class="row  my-4 p-0 m-0 p-sm-5  d-flex d-sm-none">
    <div class="col-6 col-sm-6  m-0">
        <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'aboutus', 'action' => 'ourbranch']) ?>" class="row m-0 d-flex justify-content-between  bg-success p-2 rounded mb-2 border shadow-sm">
            <div class="col-12 my-auto p-0 m-0">
                <h6>สาขาทั้งหมด</h6>
                <h1  class=" m-0 p-0" style="font-size:2rem ;">20 สาขา </h1>
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
<div class="row m-sm-5 m-0 p-0 p-sm-5 d-flex justify-content-between">

    <div class="col-12 col-sm-5 py-3 p-2 h-100 text-sm-center text-start  mb-2">
        <h1 class="text-success">สาขาของเรา</h1>
        <h5>สาขาที่เรามีทั้งหมด</h5>
        <a href="/about/ourBranch">อ่านทั้งหมด</a>

    </div>

    <div class="col-12 col-sm-6 m-0 p-0 mb-3">
        <div id="OurBranch" class="carousel slide m-0 p-2" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active border-sm">
                    <div class="branch-title">
                        <div class="btn btn-success rounded-full">เชียงใหม่</div>
                    </div>
                    <img class="d-block w-100" src="https://resource.nationtv.tv/uploads/images/md/2021/10/RFYjf49ZwTS0tXu2x0zZ.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <div class="branch-title border-sm">
                        <div class="btn btn-success rounded-full">กรุงเทพ</div>
                    </div>
                    <img class="d-block w-100" src="https://thailandproperty.knightfrank.co.th/news/wp-content/uploads/2018/10/3252164.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <div class="branch-title">
                        <div class="btn btn-success rounded-full">อยุธยา</div>
                    </div>
                    <img class="d-block w-100" src="https://travel.mthai.com/app/uploads/2018/01/ayudta.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#OurBranch" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#OurBranch" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
</div>

<div class="row m-sm-5 m-0 p-0 py-sm-5">
    <div class="col-12  py-3 p-2 h-100 text-sm-center text-start  mb-2">
        <h1 class="text-success">สินค้าของเรา</h1>
        <h5>สินค้าภายในร้านของเรา</h5>
        <a href="/Products">อ่านทั้งหมด</a>

    </div>
    <?php foreach ($Products as $value) : ?>

        <div class="col-6 col-sm-4 p-sm-3 m-0">
            <div class="card m-sm-4 ">
                <img class="card-img-top w-100" src="<?= $this->Url->build($value->image); ?>" alt="Third slide">
            </div>
        </div>
    <?php endforeach; ?>


</div>

<div class="row m-sm-5 m-0 p-0 p-sm-5 d-flex justify-content-between ">
    <div class="col-12 col-sm-4 py-3 p-2 h-100 text-start text-sm-start mb-2">
        <h1 class="text-success">รีวิวจากลูกค้า</h1>
        <h5>ความประทับใจของลูกค้าที่มีต่อเรา</h5>
        <a href="/about/ourCustomer">อ่านทั้งหมด</a>

    </div>
    <div class="col-12 col-sm-8 py-3 p-2 m-0 p-0 mb-3">
        <div class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row m-0 p-0">
                        <div class="col-4 col-sm-2 m-0 p-2  ">
                            <img class="d-block w-75 justify-item-center " src="https://scontent.fbkk12-5.fna.fbcdn.net/v/t39.30808-1/305087796_642308717321314_5834137490196069048_n.jpg?stp=dst-jpg_p160x160&_nc_cat=105&ccb=1-7&_nc_sid=7206a8&_nc_eui2=AeG0tNF2bBRZd6Nl1J5qy8IjX6twctv04Utfq3By2_ThS4HzslP5OZOG9DSQgVO-h4zyskMcxsfm_Eiv-cbXztEM&_nc_ohc=uXTgw446BYcAX-_TNO6&_nc_ht=scontent.fbkk12-5.fna&oh=00_AfAzKhDAeshKxe156x9yZFO3BprWTcRNAQSCyjyblhfAsg&oe=635F5F1E" class="rounded-full" alt="Third slide">
                        </div>
                        <div class="col-8 col-sm-10 m-0 p-2">
                            <h4 class="m-0 p-0 mb-1"><q>ชอบการบริการครับ ประทับใจ</q></h4>
                            <p class="m-0 p-0">Nack Thanaphon</p>
                            <small class="m-0">11 พฤศจิกายน 2565</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row m-sm-5 m-0 p-0 py-sm-5">
    <div class="col-12  py-3 p-2 h-100 text-sm-center text-start mb-2">
        <h1 class="text-success ">
            ธุรกิจของเรา
        </h1>
        <h5>ครอบคุมทั้งภายในและส่งออก</h5>
        <a href="/about/ourBusiness">อ่านทั้งหมด</a>

    </div>
    <div class="col-12 col-sm-4  mb-2">
        <div class="alert alert-success m-0 p-2 p-sm-3 d-flex justify-content-between rounded text-white">
            <div class="my-auto p-0">
                <h2 class="m-0 p-0">ธุรกิจส่งออก</h2>
                <small class="mb-3">เครื่องใช้ และ ผลไม้ต่างๆ</small> <br>
                <a href="http://">
                    <small>อ่านเพิ่มเติม..</small>
                </a>
            </div>
            <i class="fas fa-plane my-auto" style="font-size: 4.4rem;"></i>
        </div>
    </div>
    <div class="col-12 col-sm-4  mb-2">
        <div class="alert alert-success  m-0 p-2 p-sm-3 d-flex justify-content-between rounded text-white">
            <div class=" my-auto p-0">
                <h2 class="m-0 p-0">ธุรกิจแฟรนไชส์</h2>
                <small class="mb-3">น้ำปั่นสมูทตี้ แม่ปลูกลูกขาย </small> <br>
                <a href="http://">
                    <small>อ่านเพิ่มเติม..</small>
                </a>
            </div>
            <i class="fas fa-people-arrows my-auto" style="font-size: 4.4rem;"></i>
        </div>
    </div>
    <div class="col-12 col-sm-4  mb-2">
        <div class="alert alert-success m-0 p-2 p-sm-3 d-flex justify-content-between rounded text-white">
            <div class="my-auto p-0">
                <h2 class="m-0 p-0">ธุรกิจการผลิต</h2>
                <small class="mb-3">ผลไม้และอาหารแปรรูป</small> <br>
                <a href="http://">
                    <small>อ่านเพิ่มเติม..</small>
                </a>
            </div>
            <i class="fas fa-seedling my-auto" style="font-size: 4.4rem;"></i>
        </div>
    </div>
</div>

<div class="row m-sm-5 m-0 p-0 py-sm-5">
    <div class="col-12  py-3 p-2 h-100 text-sm-center text-start  mb-2">
        <h1 class="text-success">
            บทความ
        </h1>
        <h5>บทความต่างๆและความรู้ของเรา</h5>
        <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'posts', 'action' => 'index']) ?>">อ่านทั้งหมด</a>
    </div>
    <div class="col-12  m-0">
        <div class="row m-0 p-0 mb-3">
            <?php foreach ($posts as $key => $post) : ?>
                <div class="col-sm-4 col-12 m-0 p-0">
                    <div class="card m-1 p-2">
                        <img class="d-block w-100" src="<?= $this->Url->build($post->image); ?>" alt="<?= $post->p_title ?>">
                        <div class="my-2">
                            <small class="text-muted"><?= $post->type ?></small>
                            <h6 class="my-1"><?= $post->title ?></h6>
                        </div>
                        <p class="m-0 mt-3"><?= $post->user ?></p>
                        <small class="text-muted"><i class="fas fa-clock"></i> <?= $post->date ?></small> <br>
                        <?= $this->Html->link('อ่านต่อ..', ['controller' => 'posts', 'action' => 'view', $post->id]) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>