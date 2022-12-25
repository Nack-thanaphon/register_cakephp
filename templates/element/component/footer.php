<style>
  .social {
    color: rgb(71, 120, 42) !important;
  }
</style>
<div class="row mt-3 text-white m-0 my-success py-5 m-0 text-md-left ">
  <div class="col-12 p-0 m-0">
    <div class="container">
      <div class="row m-0 p-0">
        <div class="col-12 col-sm-8 mb-2">
          <h3 class="text-uppercase font-weight-bold"><?= $contactData->name ?></h3>
          <hr class="my-secondary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p><?= $contactData->about ?></p>
        </div>
        <div class="col-12 col-sm-4 mb-2">
          <h6 class="text-uppercase font-weight-bold">Contact</h6>
          <hr class="my-secondary  accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <i class="fas fa-home mr-3"></i> <?= $contactData->adress ?>
          </p>
          <p> <i class="fab fa-facebook-f white-text mr-2"></i> <?= $contactData->facebook ?></p>
          <p><i class="fas fa-phone mr-3"></i><?= $contactData->phone ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row  text-white m-0  m-0 text-md-left " style="background-color: #D2F786; ">
  <div class="container">
    <div class="row py-3 m-0 ">
      <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
        <div class="footer-copyright text-dark  py-2">© 2022 Copyright:
          <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'about','action'=> 'index']) ?>"> แม่ปลูกลูกขาย.com</a>
        </div>
      </div>
      <div class="col-md-6 col-lg-7 px-3 m-0 text-center text-md-right">
        <a href="<?= $contactData->facebook ?>" class="fb-ic text-white social">
          <i class="fab fa-facebook-f white-text mr-2"> </i>
        </a>
        <a href="<?= $contactData->facebook ?>" class="tw-ic text-white social">
          <i class="fab fa-twitter white-text mr-2"> </i>
        </a>
        <a href="<?= $contactData->facebook ?>" class="gplus-ic text-white social">
          <i class="fab fa-google-plus-g white-text mr-2"> </i>
        </a>
        <a href="<?= $contactData->facebook ?>" class="li-ic text-white social">
          <i class="fab fa-linkedin-in white-text mr-2"> </i>
        </a>
        <a href="<?= $contactData->facebook ?>" class="ins-ic text-white social">
          <i class="fab fa-instagram white-text"> </i>
        </a>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>