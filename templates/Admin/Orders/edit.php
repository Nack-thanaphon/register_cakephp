<!--  -->
<div class="row my-3">
    <div class="col-12 d-flex justify-content-between my-4 px-3">
        <h3 class="font-weight-bold"><?= __('อัพเดตสถานะออเดอร์') ?></h3>
        <?= $this->Html->link(__('Back to'), ['action' => 'index'], ['class' => ' mb-2']) ?>
    </div>
    <div class="col-12 col-sm-8 ">
        <div class="row m-0 p-0">
            <div class="col-12 col-sm-6 m-0 p-0">
                <div class="card p-3 m-1 mb-2">
                    <div class="row m-0 p-0 d-flex my-auto justify-content-between">
                        <h6 class="text-muted">สถานะสินค้า</h6>
                    </div>
                    <h2 class="text-primary">กำลังดำเนินการ</h2>
                    <small>วันที่สั่งซื้อ: <?= $OrdersData[0]['date'] ?></small>
                </div>
            </div>
            <div class="col-12 col-sm-6 m-0 p-0">
                <div class="card  p-3 mb-2 m-1 ">
                    <label class="text-muted">การชำระเงิน</label>
                    <h5>รหัสออเดอร์ : <?= $OrdersData[0]['id'] ?></h5>
                    <h6>สถานะ : <span class="text-success"><i class="fas fa-check-circle"></i> ชำระแล้ว</span></h6>
                </div>
            </div>
        </div>
        <div class="card p-3 m-1 mb-2 m-0">
            <div class="col-12 d-flex justify-content-between m-0 p-0 ">
                <b class="mb-2 text-muted">ประวัติสถานะการทำรายการ</b>
                <a class="btn btn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">อัพเดตสถานะ <i class="fas fa-pen-square"></i></a>
            </div>
            <!-- <div class="d-flex justify-content-between mb-2">
                <p class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> รับออเดอร์</p>
                <p class="text-muted">19 ตุลาคม 2565</p>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <p class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> กำลังดำเนินการ</p>
                <p class="text-muted">20 ตุลาคม 2565</p>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <p class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> อยู่ระหว่างการจัดส่ง</p>
                <p class="text-muted">21 ตุลาคม 2565</p>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <p class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> จัดส่งเรียบร้อย</p>
                <p class="text-muted">22 ตุลาคม 2565</p>
            </div> -->
        </div>
        <div class="card m-1 p-3 m-0 ">
            <div class="col-12 d-flex justify-content-between m-0 p-0 ">
                <b class="mb-2 text-muted">รายละเอียดออเดอร์</b>
                <a class="btn btn"><i class="fa-solid fa-print"></i></a>
            </div>
            <?php foreach ($OrdersData as $rowData) : ?>
                <div class="row m-0  mb-1 px-2 ">
                    <!-- รหัสภาพ <?= $rowData['product_id'] ?> <br> -->
                    <!-- รหัสสินค้า <?= $rowData['p_id'] ?> -->
                    <div class="col-3 p-2 m-0 p-0 m-auto">
                        <div class="w-75 h-75" style="overflow: hidden;">
                            <img class="w-100 d-flex justify-content-center" src="<?php echo $this->Url->build($rowData['image'], ['fullBase' => true]); ?>" alt="">
                        </div>
                    </div>
                    <div class="col-9 p-2 my-auto m-0 p-0 ">
                        <p class="m-0 p-0 text-success"><?= $rowData['title'] ?></p>
                        <small class="text-muted ">จำนวน <?= $rowData['total'] ?> ชิ้น</small> <br>
                        <p>ราคา <?= $rowData['price'] ?> บาท</p>
                    </div>
                </div>
            <?php endforeach; ?>
            <hr>
            <section class="d-flex justify-content-between">
                <h4>ยอดรวมชำระ</h4>
                <h1><?= $OrdersData[0]['Total_price'] ?> บาท</h1>
            </section>
        </div>
    </div>
    <div class="col-12 col-sm-4">
        <div class="card p-3 m-1 mx-auto mb-2">
            <label for="" class="text-muted">ลูกค้า</label>
            <h3>ธนพล กัลปพฤกษ์</h3>
            <h6>เบอร์โทร :063679204</h6>
            <a href="http://">ดูประวัติการสั่งซื้อ</a>
            <br>
            <hr class="m-0">
            <div class="py-2">
                <label for="" class="text-muted">ที่อยู่จัดส่ง</label> <br>
                <small class="mb-2">105/1 หอการค้าดาวอังคาร
                    ตำบล ในเวียง อำเภอ ในเวียง จังหวัด เชียงใหม่
                    รหัสไปษณีย์ 44556</small>
                <hr class="my-2 ">
                <b>หมายเหตุ</b>
                <small>**ไม่ต้องบอกเมีย</small>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">อัพเดตสถานะสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row m-0 p-0">
                    <div class="col-12 col-sm-8">
                        <h5>รหัสสินค้า | #<?= $OrdersData[0]['id'] ?></h5>
                        <small><?= $OrdersData[0]['date'] ?></small>
                    </div>
                    <div class="col-12 col-sm-4">
                        <select name="" class="custom-select" id="">
                            <option value="">รับออเดอร์</option>
                            <option value="">กำลังดำเนินการ</option>
                            <option value="">อยู่ระหว่างการจัดส่ง</option>
                            <option value="">จัดส่งเรียบร้อย</option>
                            <option value="">ยกเลิกสินค้า</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-12 my-3">
                    <div class="form-floating my-1">
                        <label>บริษัทขนส่ง</label>
                        <select name="" class="custom-select" id="">
                            <option value="">Flash Express</option>
                            <option value="">Shopee</option>
                            <option value="">Kerry</option>
                            <option value="">ไปรษณีย์ไทย</option>
                        </select>
                    </div>
                    <div class="form-floating my-1">
                        <label>เลขพัสดุสินค้า</label>
                        <input id="ordernumber" class="form-control" placeholder="เลขพัสดุสินค้า"></input>
                    </div>
                    <div class="mt-3">
                        <hr class="my-2">
                        <div class=" my-3 text-muted">
                            <h6 class="font-weight-bold"><i class="fas fa-check-circle "></i> รับออเดอร์
                                <br>
                                <span>
                                    <small class="text-muted">19 ตุลาคม 2565</small>
                                </span>
                            </h6>

                        </div>
                        <div class=" my-3 text-muted">
                            <h6 class="font-weight-bold"><i class="fas fa-check-circle "></i> กำลังดำเนินการ
                                <br>
                                <span>
                                    <small class="text-muted">20 ตุลาคม 2565</small>
                                </span>
                            </h6>

                        </div>
                        <div class=" my-3 text-muted">
                            <h6 class="font-weight-bold"><i class="fas fa-check-circle "></i> อยู่ระหว่างการจัดส่ง
                                <br>
                                <span>
                                    <small class="text-muted">21 ตุลาคม 2565</small>
                                </span>
                            </h6>

                        </div>
                        <div class="mt-3">
                            <h6 class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> จัดส่งเรียบร้อย
                                <br>
                                <span>
                                    <small class="text-muted">22 ตุลาคม 2565</small>
                                </span>
                            </h6>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary">บันทึกข้อมูล</button>
            </div>
        </div>
    </div>
</div>