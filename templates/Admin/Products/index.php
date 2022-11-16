<div class="container-fluid">
    <div class="row my-5 h-100 ">
        <div class="col-sm-4  col-12 news_orders">
            <h3 class="mb-3 m-1"> สถิติสินค้า</h3>
            <div class="row  m-0 p-0">
                <div class="col-12 col-sm-12 m-0 p-0">
                    <div class="m-1 p-2 card bg-success">
                        <p class="m-0 p-0 ">สินค้าทั้งหมด</h4>
                        <h6 class="text-right m-0 p-0 font-weight-bold">100
                            <span><small>/ ชิ้น</small></span></h3>
                    </div>
                </div>
                <div class="col-6 col-sm-12 m-0 p-0">
                    <div class="m-1 p-2 card bg-primary">
                        <p class="m-0 p-0 ">ประเภทสินค้าทั้งหมด</h4>
                        <h6 class="text-right m-0 p-0 font-weight-bold">2
                            <span><small>/ ประเภท</small></span></h3>
                    </div>
                </div>
                <div class="col-6 col-sm-12 m-0 p-0">
                    <div class="m-1 p-2 card shadow-sm ">
                        <p class="m-0 p-0 ">สินค้าขายดีที่สุด</h4>

                        <h6 class="text-right m-0 p-0 font-weight-bold"><?= number_format((float)100000) ?>
                            <span><small>/ ครัั้ง</small></span></h3>
                    </div>
                </div>
            </div>
            <div class="card m-1 p-3 mb-2">
                <div class="row m-0 p-0">
                    <div class="col-sm-12 col-12">
                        <div>
                            <h5 class="m-0 p-0">#15433</h5>
                            <small class="text-muted">วันที่ : <?= date('d-m-Y') ?></small><br>
                            <small class="text-muted">สถานะ : <span class="text-danger">รอการยืนอีเมลล์</span> </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8  col-12 order_table">
            <h3 class="mb-3"> จัดการข้อมูลสินค้า</h3>
            <div class="card  p-2">
                <div class="col-12  d-sm-flex justify-content-between mb-2 m-0 p-0">
                    <div class="">
                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'add']) ?>" class="btn btn-outline-primary m-1">จัดการโปรโมชั่น</a>
                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'add']) ?>" class="btn btn-outline-primary m-1">เพิ่มชนิดสินค้า</a>
                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'add']) ?>" class="btn btn-outline-primary m-1">เพิ่มสินค้า</a>
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
                        <?php foreach ($products as $product) : ?>
                            <tr class="shadow-sm">
                                <td class="w-40" style="width: 150px; overflow: hidden;height:150px ;">
                                    <a data-fslightbox href="<?php echo $this->Url->build($product->image, ['fullBase' => true]); ?>">
                                        <img class="w-100" style="object-fit:contain;" src="<?php echo $this->Url->build($product->image, ['fullBase' => true]); ?>">
                                    </a>
                                </td>
                                <td class="w-50">
                                    <h5 class="m-0 p-0 "><?= $product->title ?></a></p>
                                        <small class="m-0 p-0 text-muted"><?= $product->date ?></small><br>
                                        <small class="m-0 p-0 text-muted"> <?= $product->user ?></small>
                                </td>
                                <td class="w-10">
                                    <?= ($product->status == 1 ? '<small class="badge badge-primary">เผยแพร่</small>' : '<small class="badge badge-danger">ไม่เผยแพร่</small>') ?>
                                </td>
                                <td class="actions w-30">
                                    <a href="<?= $this->Url->build(['controller' => 'products', 'action' => 'edit', $product->id]) ?>" type="button" class=" p-1 text-muted">อัพเดต</a>
                                    <a href="<?= $this->Url->build(['controller' => 'products', 'action' => 'view', $product->id]) ?>" class="p-1 text-primary">ดูข้อมูล</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
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