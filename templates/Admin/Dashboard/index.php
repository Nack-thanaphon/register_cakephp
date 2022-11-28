<?php $this->assign('title','หน้าหลัก'); ?>

<div class="row  m-0 py-3 p-0">
    <div class="col-12 col-md-12 col-lg-12 p-3">
        <h3>หน้าหลัก</h3>
    </div>
    <div class="col-12 col-md-12 col-lg-8 ">
        <div class="row m-0 p-0">
            <div class="col-12 col-lg-4 m-0  ">
                <div class="mb-2 p-3 m-0 p-0 rounded card ">
                    <div class="row m-0 p-0 ">
                        <div class="m-0 p-0 col-3 text-center text-primary m-auto">
                            <h1 class="fas fa-credit-card m-0 p-0 "></h1>
                        </div>
                        <div class=" col-9 my-auto">
                            <p class="m-0 p-0 text-muted"></i>จำนวนยอดขายทั้งหมด</p>
                            <h4 class="mt-2"><?= number_format((float)100000) ?>
                                <span>
                                    <small>/ บาท</small>
                                </span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12  col-lg-4 m-0">
                <div class="mb-2 p-3 m-0 p-0 rounded card ">
                    <div class="row m-0 p-0 ">
                        <div class="m-0 p-0 col-3 text-center text-primary m-auto">
                            <h1 class="fas fa-user-friends m-0 p-0"></h1>
                        </div>
                        <div class=" col-9 my-auto">
                            <p class="m-0 p-0 text-muted">จำนวนสินค้าทั้งหมด</p>
                            <h4 class="mt-2"><?= $countProduct ?>
                                <span>
                                    <small>/ รายการ</small>
                                </span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12  col-lg-4 m-0">
                <div class="mb-2 p-3 m-0 p-0 rounded card ">
                    <div class="row m-0 p-0 ">
                        <div class="m-0 p-0 col-3 text-center text-primary m-auto">
                            <h1 class="fas fa-store m-0 p-0"></h1>
                        </div>
                        <div class=" col-9 my-auto">
                            <p class="m-0 p-0 text-muted">จำนวนสาขาทั้งหมด</p>
                            <h4 class="mt-2"><?= $countBranch ?>
                                <span>
                                    <small>/ สาขา</small>
                                </span>
                            </h4>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 ">
                <div class="card card-primary h-100">
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <p class="text-primary">ยอดขายแบบรายปี 2565</p>

                            <div id="chart" class="h-100">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-4 h-100">
        <div class="row m-0 p-0 mb-2">
            <div class="card  w-100 p-3 m-2 m-sm-0">
                <p class="text-primary m-0 p-0">ออเดอร์วันนี้</p>
                <hr class="m-0 pb-2">
                <table>
                    <tbody>
                        <?php
                        if (!empty($ordersToday)) {
                            foreach ($ordersToday as $key => $value) : ?>
                                <tr>
                                    <td colspan="2" class="pb-3">
                                        <p class="m-0 p-0">#<?= $value->orders_code ?></p>
                                        <small class="m-0 p-0 text-muted">เวลา: <?= $value->created_at ?></small>

                                    </td>
                                    <td colspan="1" class="text-right pb-3">
                                        <p class="text-muted m-0 p-0"><?= (!empty(($value->user['name']))) ? $value->user['name'] : "รอข้อมูลผู้ใช้งาน" ?></p>
                                        <?php
                                        $orderStatus = $value->status;
                                        if ($orderStatus == 0) {
                                            echo '<div class="badge badge-danger">ยกเลิก</div>';
                                        }
                                        if ($orderStatus == 1) {
                                            echo '<div class="badge badge-primary">ชำระเงินแล้ว</div>';
                                        }
                                        if ($orderStatus == 2) {
                                            echo '<div class="badge badge-warning">รอการชำระเงิน</div>';
                                        }
                                        if ($orderStatus == 3) {
                                            echo '<div class="badge badge text-primary">กำลังดำเนินการ</div>';
                                        }
                                        if ($orderStatus == 4) {
                                            echo '<div class="badge badge-success">จัดส่งแล้ว</div>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            <tr>
                                <td>
                                    <p class="text-muted m-0 p-0">ไม่มีข้อมูล</p>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="btn btn text-right m-0 p-0 mt-3">
                    <a href="<?= $this->Url->build(['controller' => 'orders', 'action' => 'index']) ?>" class="text-muted">อ่านต่อทั้งหมด </a>
                </div>
            </div>
        </div>
        <div class="row m-0 p-0 mb-2">
            <div class="card h-100 w-100 p-3 m-2 m-sm-0">
                <p class="text-primary m-0 p-0">ข่าวสารล่าสุด</p>
                <hr class="m-0 pb-2">
                <table>
                    <tbody>
                        <?php
                        $posts = $this->Custom->countPost();
                        if ($posts) {
                            foreach ($posts as $key => $value) : ?>
                                <tr>
                                    <td colspan="2" class="pb-2 ">
                                        <small class="text-muted"><?= $value->posttype ?>|<?= $value->date ?></small>
                                        <p class="m-0 p-0"><?= $value->title ?></p>
                                        <small class="text-muted"><span class="text-dark"><?= $value->user ?></span>|<?= $value->userrole ?></small>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            <tr>
                                <td>
                                    <p class="text-muted m-0 p-0">ไม่มีข้อมูล</p>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <div class="btn btn text-right m-0 p-0 mt-3">
                    <a href="<?= $this->Url->build(['controller' => 'posts', 'action' => 'index']) ?>" class="text-muted">อ่านต่อทั้งหมด </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        var options = {
            chart: {
                type: 'bar',
                height: 'auto'
            },
            series: [{
                name: 'sales',
                data: [30, 40, 45, 50, 49, 60, 450, 91, 125]
            }],
            xaxis: {
                categories: [
                    "มกราคม",
                    "กุมภาพันธ์",
                    "มีนาคม",
                    "เมษายน",
                    "พฤษภาคม",
                    "มิถุนายน",
                    "กรกฎาคม",
                    "สิงหาคม",
                    "กันยายน",
                    "ตุลาคม",
                    "พฤศจิกายน",
                    "ธันวาคม",
                ]
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    })
</script>