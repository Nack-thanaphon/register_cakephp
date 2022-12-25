
<?php $this->assign('title','ผู้ใช้งาน'); ?>

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
                            <div class="col-sm-12 col-12">
                                <div>
                                    <p class="m-0 p-0"><?= $user->name ?></p>
                                    <small class="text-muted"><?= $user->email ?></small><br>
                                    <small class="text-muted">วันที่ : <?= date('d-m-Y') ?></small><br>
                                    <small class="text-muted">สถานะ : <i class="fas fa-times-circle text-danger"></i> รอการยืนยันตัวตน</small>
                                </div>
                            </div>
                            <!-- <div class=" d-none d-sm-flex justify-content-between m-0 p-0 col-12 col-sm-4 ">
                                <p type="button" class="m-0 p-0">ยืนยัน</p>
                                <p type="button" class="m-0 p-0 text-danger">ไม่ยืนยัน</p>
                            </div> -->
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="col-sm-8  col-12 order_table">
                <h3 class="mb-3"> ตารางผู้ใช้งาน</h3>
                <div class="card  p-2">
                    <div class="col-12  d-flex justify-content-end mb-2 m-0 p-0">
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
                                        <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'edit', $user->token]) ?>" type="button" class=" p-1 text-muted"><i class="fa-solid fa-pen-to-square"></i> </a>
                                        <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $user->token]) ?>" class="p-1 text-primary"><i class="fas fa-circle-info"></i> </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>
        <?php } else { ?>
            <div class="col-sm-12  col-12 order_table">
                <div class="py-2">
                    <small class="text-muted">Users Management Systems </small>
                    <h3 class="m-0 p-0">ระบบผู้ใช้งานและสมาชิก</h3>
                </div>
                <div class="card  p-2">
                    <div class="col-12  d-flex justify-content-between mb-2 m-0 p-0">
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
                                    <td class="w-50 py-4">
                                        <p class="m-0 p-0 text-muted">ชื่อ-นามสกุล: <a href="http://"><?= $user->name ?></a></p>
                                        <small class="m-0 p-0 text-muted"><i class="fas fa-envelope p-0"></i> : <?= $user->email ?></small>
                                    </td>
                                    <td class="w-10 text-center">
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
                                    <td class="actions w-40 ">
                                        <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'edit', $user->token]) ?>" type="button" class=" p-1 text-muted"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $user->token]) ?>" class="p-1 text-primary"><i class="fas fa-circle-info"></i> </a>
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
            "order": [[ 0, 'desc' ], [ 1, 'desc' ]]
        });

     
    });
</script>