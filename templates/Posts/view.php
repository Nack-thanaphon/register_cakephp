<div class="row m-0 p-0 shadow-sm mb-3">
    <div class="col-12">
        <div class="pt-2 pb-3">
            <small class="text-muted"><?= $posts->poststype['pt_name'] ?></small>
            <h1 class="text-success"><?= $posts->p_title ?></h1>
            <small class="m-0"> <span>โดย</span> <?= $posts->user['name'] ?></small>
        </div>
        <img class="d-block w-100" src="<?= $this->Url->build($posts->p_img); ?>" alt="<?= $posts->p_title ?>">
        <div class="text-secondary pt-4"><?= $posts->p_detail ?></div>
    </div>
</div>
