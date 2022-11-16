<div class="row  m-0 py-3 p-0">
    <div class="col-12 col-md-12 col-lg-12 p-3">
        <h3>หน้าหลัก</h3>
    </div>
    <div class="col-12 col-md-12 col-lg-8 ">
        <div class="row m-0 p-0">
            <div class="col-12  col-lg-4 m-0">
                <div class="d-none d-sm-block card p-2 mb-2  m-0 py-2 rounded bg-primary">
                    <div class="card-header m-0 p-0 text-center">
                        <p class="mb-2 "><i class="fas fa-credit-card p-1" style="font-size: 1.5rem ;"></i>จำนวนยอดขายทั้งหมด</p>
                    </div>
                    <h5 class="  pt-2 text-center text-sm-right">
                        <?= number_format((float)100000) ?> <span><small>/ บาท</small></span>
                        <!-- <?= number_format((float)$this->Custom->countBalance()) ?> <span><small>/ บาท</small></span> -->
                    </h5>
                </div>
                <!-- mobile -->
                <div class="d-sm-none d-block card p-2 mb-2  m-0 py-2 rounded bg-primary">
                    <div class="card-header m-0 p-0 text-start p-1">
                        <h5 class="mb-2 "><i class="fas fa-credit-card p-1" style="font-size: 1.5rem ;"></i> จำนวนยอดขายทั้งหมด</h5>
                    </div>
                    <h1 class="-sm  pt-2 text-start p-1">
                        <?= number_format((float)100000) ?> <span><small>/ บาท</small></span>
                        <!-- <?= number_format((float)$this->Custom->countBalance()) ?> <span><small>/ บาท</small></span> -->
                    </h1>
                </div>
            </div>
            <div class="col-6  col-lg-4 m-0">
                <div class="card p-2 mb-2  m-0 py-2 rounded ">
                    <div class="card-header m-0 p-0 text-center">

                        <p class="mb-2 text-primary"> <i class="fas fa-user-friends p-1" style="font-size: 1.5rem ;"></i>จำนวนเมนูทั้งหมด</p>
                    </div>
                    <h5 class="pt-2 text-right">
                        <?= $countProduct ?> <span><small>/ เมนู</small></span>
                    </h5>
                </div>
            </div>
            <div class="col-6  col-lg-4 m-0">
                <div class="card p-2 mb-2  m-0 py-2 rounded ">
                    <div class="card-header m-0 p-0 text-center">
                        <p class="mb-2 text-primary"> <i class="fas fa-store p-1" style="font-size: 1.5rem ;"></i>จำนวนสาขาทั้งหมด</p>
                    </div>
                    <h5 class="pt-2 text-right">
                        <?= $countBranch  ?> <span><small>/ สาขา</small></span>
                    </h5>
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
                            <div id="chart" class="h-100">
                                <p class="text-primary">ยอดขายแบบรายปี</p>
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
                        // $order = $this->Custom->();
                        if ($ordersToday) {
                            foreach ($ordersToday as $key => $value) : ?>
                                <tr>
                                    <td colspan="2" class="pb-3">
                                        <p class="m-0 p-0">#<?= $value->orders_code ?></p>
                                        <small class="m-0 p-0 text-muted">เวลา: <?= $value->created_at ?></small>

                                    </td>
                                    <td colspan="1" class="text-right pb-3">
                                        <p class="text-muted m-0 p-0"><?= $value->user['name'] ?></p>
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
                                        <small class="text-muted">ข่าวทั่วไป |<?= date('d-m-y') ?></small>
                                        <p class="m-0 p-0"><?= $value->p_title ?></p>
                                        <small class="text-muted">Nack | ผู้เขียน</small>
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
                data: [30, 40, 45, 50, 49, 60, 70, 91, 125]
            }],
            xaxis: {
                categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    })
</script>