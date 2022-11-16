<div class="container-fluid">
    <div class="row my-5 h-100 ">
        <?php if (!empty($usersUnVerifiled)) { ?>
            <div class=" col-12 ">
                <?= $this->Flash->render() ?>
            </div>
            <div class="col-sm-4 col-12 news_orders">
                <h3 class="mb-3"> ลูกค้าใหม่</h3>
                <?php foreach ($usersUnVerifiled as $user) : ?>
                    <div class="card  p-3 mb-2">
                        <div class="row m-0 p-0">
                            <div class="col-sm-8 col-12">
                                <div>
                                    <p class="m-0 p-0"><?= $user->name ?></p>
                                    <small class="text-muted"><?= $user->email ?></small><br>
                                    <small class="text-muted">วันที่ : <?= date('d-m-Y') ?></small><br>
                                    <small class="text-muted">สถานะ : <i class="fas fa-times-circle text-danger"></i> รอการยืนยันตัวตน</small>
                                </div>
                            </div>
                            <div class=" d-none d-sm-flex justify-content-between m-0 p-0 col-12 col-sm-4 ">
                                <p type="button" class="m-0 p-0">ยืนยัน</p>
                                <p type="button" class="m-0 p-0 text-danger">ไม่ยืนยัน</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="col-sm-8  col-12 order_table">
                <h3 class="mb-3"> ตารางผู้ใช้งาน</h3>
                <div class="card  p-2">
                    <div class="col-12  d-flex justify-content-between mb-2 m-0 p-0">
                        <button class="btn btn-primary m-1">กลับ</button>
                        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'add']) ?>" class="btn btn-outline-primary m-1">เพิ่มผู้ใช้งาน</a>
                    </div>
                    <table id="example" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ข้อมูลส่วนตัว</th>
                                <th>สถานะ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                                <tr class="shadow-sm ">
                                    <td class="w-50 py-4 ">
                                        <p class="m-0 p-0 text-muted">ชื่อ-นามสกุล: <a href="http://"><?= $user->name ?></a></p>
                                        <small class="m-0 p-0 text-muted"><i class="fas fa-envelope p-0"></i> : <?= $user->email ?></small>
                                    </td>
                                    <td class="w-10 ">
                                        <?php

                                        if ($user->users_role['id'] == 1) {
                                            echo '<small class="badge badge-primary">เจ้าของร้านค้า</small>';
                                        }
                                        if ($user->users_role['id'] == 2) {
                                            echo '<small class="alert alert-muted">ผู้ใช้งานทั่วไป</small>';
                                        }
                                        if ($user->users_role['id'] == 3) {
                                            echo '<small class="badge badge-success">ผู้จัดการร้านค้า</small>';
                                        }
                                        if ($user->users_role['id'] == 4) {
                                            echo '<small class="badge badge-warning">ผู้จัดการเว็บไซต์</small>';
                                        }

                                        ?>
                                    </td>
                                    <td class="actions w-30 ">
                                        <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'edit', $user->id]) ?>" type="button" class=" p-1 text-muted">อัพเดต</a>
                                        <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $user->id]) ?>" class="p-1 text-primary">ดูข้อมูล</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>
        <?php } else { ?>
            <div class="col-sm-12  col-12 order_table">
                <div class=" col-12 ">
                    <?= $this->Flash->render() ?>
                </div>
                <h3 class="mb-3"> ตารางผู้ใช้งาน</h3>
                <div class="card  p-2">
                    <div class="col-12  d-flex justify-content-between mb-2 m-0 p-0">
                        <button class="btn btn-primary m-1">กลับ</button>
                        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'add']) ?>" class="btn btn-outline-primary m-1">เพิ่มผู้ใช้งาน</a>
                    </div>
                    <table id="example" class="table table" style="width:100%">
                        <thead>
                            <tr>
                                <th>ข้อมูลส่วนตัว</th>
                                <th>สถานะ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>

                                <tr class="shadow-sm">
                                    <td class="w-50">
                                        <p class="m-0 p-0 text-muted">ชื่อ-นามสกุล: <a href="http://"><?= $user->name ?></a></p>
                                        <p class="m-0 p-0 text-muted"> อีเมลล์ : <?= $user->email ?></p>
                                        <p class="m-0 p-0 text-muted"> วันที่สั่งซื้อ : <?= $user->created_at ?></p>
                                    </td>
                                    <td class="w-10">
                                        <small class="badge badge-primary"><?= ($user->users_role['ur_name']) ?></small>
                                    </td>

                                    <td class="actions w-30">
                                        <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'edit', $user->id]) ?>" type="button" class="m-0 p-0">อัพเดต</a> <br>
                                        <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $user->id]) ?>" class="m-0 p-0 text-primary" type="button" data-toggle="modal" data-target="#exampleModalLong">ดูข้อมูล</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        var t = $('#example').DataTable({
            responsive: true,
            order: [
                [0, 'desc']
            ],
        });

    });
</script>