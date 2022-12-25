<?php $this->assign('title', 'สินค้า'); ?>


<style>
    /* .product_card1:hover {
        box-shadow: 1px 1px 1px 1px #888888;

    } */

    .postsImg {
        position: relative;
        width: 100%;
        height: 180px;
        overflow: hidden;
    }

    .posts_type {
        position: absolute;
        top: 10px;
        left: 6px;
    }

    @media screen and (max-width: 650px) {
        .postsImg {
            position: relative;
            width: 100%;
            height: 170px;
            overflow: hidden;
        }

    }


    .header-cover {
        height: 150px;
        overflow: hidden;
        position: relative;
        text-align: center;
    }

    .header-img {
        height: auto;
        object-fit: contain;
    }

    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        transform: translate(-50%, -50%);
    }

    .centered h1 {
        color: #4E7A61;
        font-size: 4rem;
    }
</style>


<div class="header-cover">
    <img class="header-img" src="https://img.freepik.com/premium-photo/ripe-fresh-avocado-green-background-top-view_185193-10955.jpg?w=2000" alt="">
    <div class="centered">
        <h1 class="m-0 p-0">สินค้า</h1>
        <small>ผลไม้ประจำฤดูกาล</small>
    </div>
</div>

<div class="container h-100">
    <div class="row my-5 p-0 m-0">
        <div class="col-12">
            <h5>ค้นหาสินค้า</h5>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 h-100  p-1">
            <!-- <div class="mb-2">

                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect02">
                        <option selected>เลือก...</option>
                        <option value="1">โปร 1 แถม 1</option>
                        <option value="2">ส่งฟรี</option>
                        <option value="3">ตอนรับหน้าฝน</option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="inputGroupSelect02">ค้นหา</label>
                    </div>
                </div>
            </div> -->
            <div class="card p-2">
                <label for="product_type">ตามชนิดสินค้า</label>
                <form id="sizes-form">
                    <?php foreach ($ProductsType as  $data) : ?>
                        <div class="form-check">
                            <input class="form-check-input size-filter-check" type="checkbox" value="" id="size-check" data-size='<?= $data->pt_name ?>'>
                            <label class="form-check-label" for="size-check">
                                <?= $data->pt_name ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>

            <!-- <ul class="list-group d-none d-sm-block" id="product_type">
                <label for="product_type">ตามชนิดสินค้า</label>
                <li class="list-group-item"><a href="http://">#Lorem, ipsum dolor.</a></li>
                <li class="list-group-item"><a href="http://">#Lorem, ipsum dolor.</a></li>
                <li class="list-group-item"><a href="http://">#Lorem, ipsum dolor.</a></li>
                <li class="list-group-item"><a href="http://">#Lorem, ipsum dolor.</a></li>
                <li class="list-group-item"><a href="http://">#Lorem, ipsum dolor.</a></li>
            </ul> -->
        </div>
        <div class="col-sm-12 col-md-12 col-lg-9 h-100 p-0 m-0">
            <div style="overflow:hidden;">
                <div class="row m-0 p-0" id="product_items">
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var category_items = []
    $(document).ready(function() {
        $.ajax({
            url: "<?= $this->Url->build('/api/product', ['fullBase' => true]); ?>",
            type: "GET",
            dataType: "json", // added data type
            success: function(result) {
                for (i = 0; i < result.length; i++) {
                    category_items.push(result[i])
                }
                showAllItems();
            },
        });

        function clearDuplicates(data) {
            var temp = {};
            for (var i = 0; i < data.length; i++) {
                temp[data[i]['id']] = data[i];
            }
            return Object.values(temp);
        }

        let ProductsTypeArray = []; //Where the filtered sizes get stored


        $(".size-filter-check").click(function() {
            //When a checkbox is clicked
            let type_clicked = $(this).attr("data-size"); //The certain size checkbox clicked
            if ($(this).is(":checked")) {
                ProductsTypeArray.push(type_clicked); //Was not checked so add to filter array
                showItemsFiltered(); //Show items grid with filters
            } else {
                //Unchecked so remove from the array
                ProductsTypeArray = ProductsTypeArray.filter(function(elem) {
                    return elem !== type_clicked;
                });
                showItemsFiltered(); //Show items grid with new filters
            }

            if (!$("input[type=checkbox]").is(":checked")) {
                //No checkboxes are checked
                ProductsTypeArray = []; //Clear size filter array
                showAllItems(); //Show all items with NO filters applied
            }

        });


        //Mock API data:
        function showAllItems() {
            //Default grid to show all items on page load in
            productItem = '';
            for (let i = 0; i < category_items.length; i++) {
                productItem += `
                <div class=" col-sm-4 col-6 " id="productCart_list" >
                    <a href="<?php echo $this->Url->build(['controller' => 'products', 'action' => 'view',]); ?>/${category_items[i]['id']}/${category_items[i]['title']}" >
                        <div class="card product_card1">
                            <div class=" ">
                                <small class="text-muted posts_type badge badge-pill badge-success text-white m-0 ">${category_items[i]['type']}</small>
                                 <img class="d-block w-100" src="<?php echo $this->Url->build('/', ['fullBase' => true]); ?>${category_items[i]['image']}" style="width:100%;height:190px;object-fit:cover;">
                                    </div>
                                <div class="card-body m-0 p-2">
                                <h5 class="col-12 text-truncate my-1 m-0 p-0">${category_items[i]['title']}</h5>
                                    <div class="text-right m-0 ">
                                        <h5 class="text-success mt-1 m-0 p-0  d-none d-sm-block"> ${category_items[i]['price']}บาท/ชิ้น </h5>
                                        <small class="text-success mt-1 m-0 p-0  d-block d-sm-none"> ${category_items[i]['price']}บาท/ชิ้น </small>
                                        <small class="text-muted text-right m-0 p-0">ในคลัง ${category_items[i]['total']} ชิ้น</small>
                                       <div class="row mt-3 m-0 p-0 d-flex justify-content-between" > 
                                            <div class="col-2 m-0 p-0">
                                                <a href="https://line.me/R/oaMessage/<?= $contactData->lineoficial; ?>?สอบถามสินค้า${category_items[i]['title']}" target="blank" class="btn btn m-0 p-0 w-100 ">
                                                    <h5 class="fab fa-line text-success m-0 p-0"></h5>
                                                </a>
                                            </div>
                                            <div class="col-9 m-0 p-0">
                                                 <a class="btn btn-white m-0 p-0  w-100" href="<?php echo $this->Url->build(['controller' => 'products', 'action' => 'view',]); ?>/${category_items[i]['id']}/${category_items[i]['title']}">
                                                    <small class="m-0 p-0" ><i class="fas fa-link"></i> รายละเอียดสินค้า</small>
                                                </a>
                                            </div>
                                       </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>`;
            }
            $("#product_items").html(productItem);
        }

        function showItemsFiltered() {

            let FilteredItem = ""
            //Default grid to show all items on page load in
            for (let i = 0; i < category_items.length; i++) {
                //Go through the items but only show items that have size from ProductsTypeArray

                if (ProductsTypeArray.some((v) => category_items[i]['type'].includes(v))) {
                    FilteredItem += `
                    <div class=" col-sm-4 col-6 " id="productCart_list" >
                    <a href="<?php echo $this->Url->build(['controller' => 'products', 'action' => 'view',]); ?>/${category_items[i]['id']}/${category_items[i]['title']}" >
                        <div class="card product_card1">
                            <div class=" ">
                                <small class="text-muted posts_type badge badge-pill badge-success text-white m-0 ">${category_items[i]['type']}</small>
                                 <img class="d-block w-100" src="<?php echo $this->Url->build('/', ['fullBase' => true]); ?>${category_items[i]['image']}" style="width:100%;height:190px;object-fit:cover;">
                                    </div>
                                <div class="card-body m-0 p-2">
                                <h5 class="col-12 text-truncate my-1 m-0 p-0">${category_items[i]['title']}</h5>
                                    <div class="text-right m-0 ">
                                        <h5 class="text-success mt-1 m-0 p-0  d-none d-sm-block"> ${category_items[i]['price']}บาท/ชิ้น </h5>
                                        <small class="text-success mt-1 m-0 p-0  d-block d-sm-none"> ${category_items[i]['price']}บาท/ชิ้น </small>
                                        <small class="text-muted text-right m-0 p-0">ในคลัง ${category_items[i]['total']} ชิ้น</small>
                                       <div class="row mt-3 m-0 p-0 d-flex justify-content-between" > 
                                            <div class="col-2 m-0 p-0">
                                                <a href="https://line.me/R/oaMessage/<?= $contactData->lineoficial; ?>?สอบถามสินค้า${category_items[i]['title']}" target="blank" class="btn btn m-0 p-0 w-100 ">
                                                    <h5 class="fab fa-line text-success m-0 p-0"></h5>
                                                </a>
                                            </div>
                                            <div class="col-9 m-0 p-0">
                                                 <a class="btn btn-white m-0 p-0  w-100" href="<?php echo $this->Url->build(['controller' => 'products', 'action' => 'view',]); ?>/${category_items[i]['id']}/${category_items[i]['title']}">
                                                    <small class="m-0 p-0" ><i class="fas fa-link"></i> รายละเอียดสินค้า</small>
                                                </a>
                                            </div>
                                       </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>`;
                }
                $("#product_items").html(FilteredItem);
            }
        }
    });
</script>