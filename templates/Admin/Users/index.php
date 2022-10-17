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
        <select id="userFilter" class="Form-control-sm">
            <option value="">Show All</option>
            <?php foreach ($users as $user) : ?>


                <option value="<?= ($user->userstype['ut_name']) ?>"> <?= ($user->userstype['ut_name']) ?></option>

            <?php endforeach; ?>

        </select>
    </div>

    <!-- Set up the datatable -->
    <table class="table" id="UserTable">
        <thead>
            <tr>
                <th></th>
                <th>ชื่อ</th>
                <th>ตำแหน่ง</th>
                <th>เบอร์โทร</th>
                <th>สถานะ</th>
                <th>แก้ไข</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td></td>
                    <td class="w-40"><?= $user->name ?></td>
                    <td class="w-20"><?= ($user->usersrole['ur_name']) ?></td>
                    <td class="w-10"><?= $user->status ?></td>
                    <td class="actions w-20">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn btn-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-secondary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id],['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<script>
    $("document").ready(function() {
        $("#UserTable").dataTable({
            "searching": true
        });
        var table = $('#UserTable').DataTable();
        $("#UserTable_filter.dataTables_filter").append($("#userFilter"));
        var categoryIndex = 6;
        $("#UserTable th").each(function(i) {
            if ($($(this)).html() == "Category") {
                categoryIndex = i;
                return false;
            }
        });

        //Use the built in datatables API to filter the existing rows by the Category column
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var selectedItem = $('#userFilter').val()
                var category = data[categoryIndex];
                if (selectedItem === "" || category.includes(selectedItem)) {
                    return true;
                }
                return false;
            }
        );

        $("#userFilter").change(function(e) {
            table.draw();
        });
        table.draw();
    });
</script>