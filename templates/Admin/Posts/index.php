<style>
    select.Form-control {
        display: inline;
        width: 200px;
        margin-left: 25px;
    }
</style>
<div class="container mt-4">
    <!-- Create the drop down filter -->
    <div class="category-filter">
        <select id="categoryFilter" class="Form-control-sm">
            <option value="">Show All</option>
            <?php foreach ($posts as $post) : ?>


                <option value="<?= ($post->poststype['pt_name']) ?>"> <?= ($post->poststype['pt_name']) ?></option>

            <?php endforeach; ?>

        </select>
    </div>

    <!-- Set up the datatable -->
    <table class="table" id="filterTable">
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
            <?php foreach ($posts as $post) : ?>
                <tr>
                    <td></td>
                    <td class="w-10">
                        <img class="w-50 h-50" src="<?= $this->Url->build($post->p_img, ['fullBase' => true]); ?>">
                    </td>
                    <td class="w-40"><?= $post->p_title ?></td>
                    <td class="w-20"><?= ($post->poststype['pt_name']) ?></td>
                    <td class="w-10"><?= ($post->p_status) ?></td>
                    <td class="actions w-20">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $post->id], ['class' => 'btn btn-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $post->id], ['class' => 'btn btn-secondary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $post->id], ['class' => 'btn btn-danger delete','onClick' => 'deleteConfirm(' . $products->p_id . ')', 'confirm' => __('')]) ?>

                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<script>
    $("document").ready(function() {
        $("#filterTable").dataTable({
            "searching": true
        });

        var table = $('#filterTable').DataTable();
        $("#filterTable_filter.dataTables_filter").append($("#categoryFilter"));
        var categoryIndex = 6;
        $("#filterTable th").each(function(i) {
            if ($($(this)).html() == "Category") {
                categoryIndex = i;
                return false;
            }
        });

        //Use the built in datatables API to filter the existing rows by the Category column
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var selectedItem = $('#categoryFilter').val()
                var category = data[categoryIndex];
                if (selectedItem === "" || category.includes(selectedItem)) {
                    return true;
                }
                return false;
            }
        );

        $("#categoryFilter").change(function(e) {
            table.draw();
        });
        table.draw();
    });


</script>