<!-- Modal -->
<div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="header"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" class="w-50 h-50" id="img" alt="">
                <h2 id="name"></h2>
            </div>

        </div>
    </div>
</div>


<div class=" pt-3 mb-2 col-12 d-flex justify-content-end">
    <?= $this->Html->link(__('เพิ่มสินค้า'), ['action' => 'add'], ['class' => 'btn btn-primary ']) ?>

</div>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th></th>
            <th>ภาพสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>ชนิด</th>
            <th>ราคา</th>
            <th>แก้ไข</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($product as $products) : ?>
            <tr>
                <td></td>
                <td class="w-10">
                    <img class="w-50 h-50" src="<?php echo $this->Url->build($products->p_image_id, ['fullBase' => true]); ?>">
                </td>
                <td class="w-30"><?= $products->p_title ?></td>
                <td class="w-10"><?= ($products->productstype['pt_name']) ?></td>
                <td class="w-15"><?= $this->Number->Format($products->p_price) ?></td>
                <td class="actions w-30">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button class="btn btn-primary" onclick="singleProducts(<?= $products->p_id ?>,'รายการสินค้า')">ดูข้อมูล</button>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $products->p_id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $products->p_id], ['class' => 'btn btn-danger delete', $products->p_id]) ?>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        var t = $('#example').DataTable({
            columnDefs: [{
                searchable: false,
                orderable: false,
                targets: 0,
            }, ],
            order: [
                [1, 'asc']
            ],
        });

        t.on('order.dt search.dt', function() {
            let i = 1;

            t.cells(null, 0, {
                search: 'applied',
                order: 'applied'
            }).every(function(cell) {
                this.data(i++);
            });
        }).draw();
    });



    function singleProducts(id, title = null) {

        $.ajax({
            url: "<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'products', 'action' => 'view']) ?>",
            type: "post",
            data: {
                p_id: id,
            },
            dataType: 'json',
            headers: {
                'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
            },
            success: function(result) {
                var url = window.location.origin;
                var img = url + "/" + result.product['p_image_id']

                $("#header").html(title)
                $("#name").html(result.product['p_title'])
                $("#img").attr("src", img)
                $("#exampleModalLabel").html(result.product['p_id'])
                $("#exampleModal").modal('show')
            },
        });
    };
</script>