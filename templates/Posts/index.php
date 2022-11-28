<?php $this->assign('title','บทความ'); ?>

<div class="jumbotron jumbotron-fluid bg-success">
  <div class="container ">
    <?= $this->element('/component/breadcrumb') ?>
    <h1 class="text-uppercase">Knowledge</h1>
    <h6>ความรู้ของเรา</h6>
  </div>
</div>
<div class="container">

  <div class="col-12 my-5 p-0 m-0 ">
    <div class="input-group mb-3">
      <input type="text" class="form-control py-4" placeholder="ค้นหาบทความต่างๆ" aria-label="Recipient's username" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-outline-primary w-100" type="button">ค้นหา</button>
      </div>
    </div>
    <?php foreach ($posts as $post) : ?>
      <div class="row m-0 p-0 shadow-sm rounded border mb-3">
        <div class="col-12 col-sm-4  m-0 p-2 ">
          <img class="d-block w-100" src="<?= $this->Url->build($post->image); ?>" alt="<?= $post->p_title ?>">
        </div>
        <div class="col-12 col-sm-8  m-0 p-2">
          <div>
            <small class="text-muted"><?= $post->type ?></small>
            <h5 class="my-1"><?= $post->title ?></h5>
            <small><?= $post->date ?></small>
          </div>
          <hr>
          <p class="m-0"><?= $post->user ?></p><br>
          <?= $this->Html->link('อ่านต่อ..', ['action' => 'view', $post->id]) ?>
        </div>
      </div>
    <?php endforeach; ?>


    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-end">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
  </div>
</div>