<div class="container-fluid">
    <div class="row my-5 h-100 ">
        <div class="col-sm-4  col-12 news_orders">
            <h3 class="mb-3"> สถิติข่าวสาร</h3>
            <div class="row  m-0 p-0">
                <div class="col-12 col-sm-12 m-0 p-0">
                    <div class="m-1 p-2 card bg-success">
                        <p class="m-0 p-0 ">บทความทั้งหมด</h4>
                        <h6 class="text-right m-0 p-0 font-weight-bold">100
                            <span><small>/ บทความ</small></span></h3>
                    </div>
                </div>
                <div class="col-6 col-sm-12 m-0 p-0">
                    <div class="m-1 p-2 card bg-primary">
                        <p class="m-0 p-0 ">ข่าวสารทั้งหมด</h4>
                        <h6 class="text-right m-0 p-0 font-weight-bold">2
                            <span><small>/ ข่าวสาร</small></span></h3>
                    </div>
                </div>
                <div class="col-6 col-sm-12 m-0 p-0">
                    <div class="m-1 p-2 card bg-danger ">
                        <p class="m-0 p-0 ">ยอดเข้าชมทั้งหมด</h4>

                        <h6 class="text-right m-0 p-0 font-weight-bold"><?= number_format((float)100000) ?>
                            <span><small>/ ครัั้ง</small></span></h3>
                    </div>
                </div>
            </div>
            <!-- <div class="card m-1 p-3 mb-2">
                <div class="row m-0 p-0">
                    <div class="col-sm-12 col-12">
                        <div>
                            <h5 class="m-0 p-0">#15433</h5>
                            <small class="text-muted">วันที่ : <?= date('d-m-Y') ?></small><br>
                            <small class="text-muted">สถานะ : <span class="text-danger">รอการยืนอีเมลล์</span> </small>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="col-sm-8  col-12 order_table">
            <h3 class="mb-3"> บทความและข่าวสารเว็บไซต์</h3>
            <div class="card  p-2">
                <div class="col-12  d-sm-flex justify-content-between mb-2 m-0 p-0">
                    <div>
                        <button class="btn btn-primary m-1">กลับ</button>
                    </div>
                    <div class="">
                        <!-- <button class="btn btn-outline-primary m-1">เพิ่มชนิดบทความ</button> -->
                        <a href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'add']) ?>" class="btn btn-outline-primary m-1">เพิ่มบทความข่าวสาร</a>
                    </div>
                </div>
                <table id="example" class="display responsive nowrap" style="width:100%">   

                    <thead>
                        <tr>
                            <th>รูปภาพปก</th>
                            <th>รายละเอียด</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post) : ?>

                            <tr class="shadow-sm">
                                <td class="w-40" style="width: 150px; overflow: hidden;height:150px ;">
                                    <a data-fslightbox href="<?php echo $this->Url->build($post->image, ['fullBase' => true]); ?>">
                                        <img class="w-100" style="object-fit:contain;" src="<?php echo $this->Url->build($post->image, ['fullBase' => true]); ?>">
                                    </a>
                                </td>
                                <td class="w-50">
                                    <h5 class="m-0 p-0 "><?= $post->title ?></a></p>
                                        <small class="m-0 p-0 text-muted"><?= $post->date ?></small><br>
                                        <small class="m-0 p-0 text-muted"> <?= $post->user ?></small>
                                </td>
                                <td class="w-10">
                                    <?= ($post->status == 1 ? '<small class="badge badge-primary">เผยแพร่</small>' : '<small class="badge badge-danger">ไม่เผยแพร่</small>') ?>

                                </td>
                                <td class="actions w-30">
                                    <a href="<?= $this->Url->build(['controller' => 'posts', 'action' => 'edit', $post->id]) ?>" type="button" class=" p-1 text-muted">อัพเดต</a>
                                    <a href="<?= $this->Url->build(['controller' => 'posts', 'action' => 'view', $post->id]) ?>" class="p-1 text-primary">ดูข้อมูล</a>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียดออเดอร์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>#11590</h2>
                <h6>ผู้สั่งซื้อ: <a href="http://">ธนพล กัลปพฤกษ์</a></h6>
                <small>วันที่สั่งซื้อ: 10/10/2565</small> <br>
                <hr>

                <b>รายการ</b>
                <ul class="py-2">
                    <li>
                        <p class="m-0 p-0">lorem3</p>
                        <small class="text-muted">*2 Lorem ipsum dolor sit.</small>
                    </li>
                    <li>
                        <p class="m-0 p-0">lorem3</p>
                        <small class="text-muted">*2 Lorem ipsum dolor sit.</small>
                    </li>
                    <li>
                        <p class="m-0 p-0">lorem3</p>
                        <small class="text-muted">*2 Lorem ipsum dolor sit.</small>
                    </li>
                </ul>
                <hr>
                <section class="d-flex justify-content-between">
                    <h3>ยอดรวมชำระ</h3>
                    <h1>390 บาท</h1>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var t = $('#example').DataTable({
            responsive: true,
        });

    });
</script>