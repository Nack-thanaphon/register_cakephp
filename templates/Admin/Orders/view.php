<div class="row my-3">
    <div class="col-12 col-sm-8 ">
        <div class="card p-3 m-1 mb-2">
            <div class="row m-0 p-0 d-flex my-auto justify-content-between">
                <h6 for="" class="text-muted">รหัสออเดอร์</h6>
                <a class="">กลับ</a>
            </div>
            <h2 class="text-primary">#<?= $OrdersData[0]['id'] ?></h2>
            <small>วันที่สั่งซื้อ: <?= $OrdersData[0]['date'] ?></small>
        </div>
        <div class="card p-3 m-1">
            <div class="col-12 d-flex justify-content-between m-0 p-0">
                <b class="mb-2 text-muted">รายละเอียดออเดอร์</b>
                <a class="btn btn"><i class="fa-solid fa-print"></i></a>
            </div>
            <?php foreach ($OrdersData as $rowData) : ?>
                <div class="row m-0  mb-1 px-2">
                    <div class="col-2 m-0 p-0">
                        <img class="w-100 d-flex justify-content-center" src="https://cdn.britannica.com/72/170772-050-D52BF8C2/Avocado-fruits.jpg" alt="">
                    </div>
                    <div class="col-10 my-auto m-0 p-0 ">
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
    <div class="col-12 col-sm-4 ">
        <div class="card p-3 mb-2 m-1 ">
            <label for="" class="text-muted">การชำระเงิน</label>
            <h3>สถานะ : <span class="text-success"><i class="fas fa-check-circle"></i> ชำระแล้ว</span></h3>
            <h6>ช่องทางการชำระ : โอนผ่านธนาคาร</h6>
            <a href="http://">ดูสลิปการโอนเงิน</a>
        </div>
        <div class="card p-2 mb-2 m-1">
            <label for="" class="text-muted">ประวัติสถานะการทำรายการ</label>
            <div class="d-flex justify-content-between mb-2">
                <small class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> รับออเดอร์</small>
                <small class="text-muted">19 ตุลาคม 2565</small>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <small class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> กำลังดำเนินการ</small>
                <small class="text-muted">20 ตุลาคม 2565</small>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <small class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> อยู่ระหว่างการจัดส่ง</small>
                <small class="text-muted">21 ตุลาคม 2565</small>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <small class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> จัดส่งเรียบร้อย</small>
                <small class="text-muted">22 ตุลาคม 2565</small>
            </div>
        </div>
        <div class="row m-0 p-0">
            <div class="col-12 col-sm-12 m-0 p-0 mb-2">
                <div class="card p-3  m-1 h-100">
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
                        <hr class="m-0">
                        <b>หมายเหตุ</b>
                        <small>**ไม่ต้องบอกเมีย</small>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>