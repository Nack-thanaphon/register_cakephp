<div class="d-flex justify-content-between py-2">
  <div class="p-0 my-auto">
    <p class="m-0 p-0"><span class="text-uppercase">language : </span><a href="/en/"> EN</a> /<a href="/th/"> TH</a></p>
  </div>
  <div class="d-flex">
    <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'users', 'action' => 'register']) ?>" class="m-1">สมัครสมาชิก</a>
    <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'users', 'action' => 'login']) ?>" class="m-1 text-muted">เข้าสู่ระบบ</a>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-white navbar-light  my-success">
  <a class="navbar-brand" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'Home', 'action' => 'index']) ?>">
    <img src="<?= $this->Url->image('logo.png') ?> " width="50" height="50" alt="">
  </a>
  <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="<?= $this->Url->build(['controller' => 'Aboutus', 'action' => 'index']) ?> "><i class="fas fa-chevron-circle-right d-lg-none d-sm-md-block "></i> Our Business <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?= $this->Url->build(['controller' => 'products', 'action' => 'index']) ?> "><i class="fas fa-chevron-circle-right d-lg-none d-sm-md-block "></i> Our Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?= $this->Url->build(['controller' => 'posts', 'action' => 'index']) ?> "><i class="fas fa-chevron-circle-right d-lg-none d-sm-md-block "></i> Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#"><i class="fas fa-chevron-circle-right d-lg-none d-sm-md-block "></i> Our Customer</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white" href="#"><i class="fas fa-chevron-circle-right d-lg-none d-sm-md-block "></i> Contact</a>
      </li>

      <div class="dropdown-divider"></div>
    </ul>
    <div class=" d-flex justify-content-end col-12 col-sm-4 col-md-12 col-lg-4 m-0 p-0 mt-2 mt-sm-0">
      <!-- <div class="my-auto"><i class="fas fa-cart-arrow-down"><span></span></i></div> -->
      <div class="btn btn-success  m-1">สั่งซื้อสินค้า</div>
      <a class="nav-link my-auto text-white" data-toggle="dropdown" href="<?= $this->Url->build(['controller' => 'carts', 'action' => 'index']) ?>">
        <i class="fas fa-cart-shopping"></i>
        <span class="badge badge-danger navbar-badge" id="cart_total"></span>
      </a>
    </div>
  </div>



</nav>




<script>
  ` <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="https://images.unsplash.com/photo-1560859253-341f42b25e20?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=Format&fit=crop&w=1170&q=80" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  น้ำสมุนไพร
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>จำนวน:</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">ไปหน้าชำระสินค้า</a>
        </div>`
</script>