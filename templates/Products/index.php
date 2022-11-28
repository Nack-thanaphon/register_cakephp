<?php $this->assign('title','สินค้า'); ?>


<style>
    .product_card1:hover {
        border: 1px solid #ee4d2d;
    }
</style>



<div class="jumbotron jumbotron-fluid bg-success">
    <div class="container ">
        <?= $this->element('/component/breadcrumb') ?>
        <h1 class="text-uppercase">Products</h1>
        <h6>สินค้าของเรา</h6>
    </div>
</div>
<div class="container">
    <div class="row my-5 p-0 m-0">
        <div class="col-12">
            <h5>ค้นหาสินค้า</h5>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 h-100  p-1">
            <div class="mb-2">

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
            </div>
            <div class="card p-2 d-none d-sm-block">
                <label for="product_type">ตามชนิดสินค้า</label>
                <form id="sizes-form">
                    <div class="form-check">
                        <input class="form-check-input size-filter-check" type="checkbox" value="" id="size-check" data-size="US-MEN-9">
                        <label class="form-check-label" for="size-check">
                            US mens 8
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input size-filter-check" type="checkbox" value="" id="size-check" data-size="US-MEN-9">
                        <label class="form-check-label" for="size-check">
                            US mens 9
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input size-filter-check" type="checkbox" value="" id="size-check" data-size="US-MEN-10">
                        <label class="form-check-label" for="size-check">
                            US mens 10
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input size-filter-check" type="checkbox" value="" id="size-check" data-size="US-MEN-11">
                        <label class="form-check-label" for="size-check">
                            US mens 11
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input size-filter-check" type="checkbox" value="" id="size-check" data-size="US-MEN-12">
                        <label class="form-check-label" for="size-check">
                            US mens 12
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input size-filter-check" type="checkbox" value="" id="size-check" data-size="US-MEN-13">
                        <label class="form-check-label" for="size-check">
                            US mens 13
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input size-filter-check" type="checkbox" value="" id="size-check" data-size="US-MEN-14">
                        <label class="form-check-label" for="size-check">
                            US mens 14
                        </label>
                    </div>
                </form>
            </div>

            <ul class="list-group d-none d-sm-block" id="product_type">
                <label for="product_type">ตามชนิดสินค้า</label>
                <li class="list-group-item"><a href="http://">#Lorem, ipsum dolor.</a></li>
                <li class="list-group-item"><a href="http://">#Lorem, ipsum dolor.</a></li>
                <li class="list-group-item"><a href="http://">#Lorem, ipsum dolor.</a></li>
                <li class="list-group-item"><a href="http://">#Lorem, ipsum dolor.</a></li>
                <li class="list-group-item"><a href="http://">#Lorem, ipsum dolor.</a></li>
            </ul>
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
    let category_items1 = [{
            id: 1,
            category_id: 8,
            price: 39.42,
            title: "Shoes with id #1",
            thumbnail: "https://www.transparentpng.com/download/adidas-shoes/a4xO3G-adidas-shoes-adidas-shoe-kids-superstar-daddy-grade.png",
            sizes: ["US-MEN-10", "US-MEN-11"]
        },
        {
            id: 2,
            category_id: 8,
            price: 31.93,
            title: "Shoes with id #2",
            thumbnail: "https://www.transparentpng.com/download/adidas-shoes/a4xO3G-adidas-shoes-adidas-shoe-kids-superstar-daddy-grade.png",
            sizes: ["US-MEN-13"]
        },
        {
            id: 3,
            category_id: 8,
            price: 49.44,
            title: "Shoes with id #3",
            thumbnail: "https://www.transparentpng.com/download/adidas-shoes/a4xO3G-adidas-shoes-adidas-shoe-kids-superstar-daddy-grade.png",
            sizes: ["US-MEN-14"]
        },
        {
            id: 4,
            category_id: 58,
            price: 65.38,
            title: "Shoes with id #4",
            thumbnail: "https://www.transparentpng.com/download/adidas-shoes/a4xO3G-adidas-shoes-adidas-shoe-kids-superstar-daddy-grade.png",
            sizes: ["US-MEN-13"]
        },
        {
            id: 5,
            category_id: 8,
            price: 27.21,
            title: "Shoes with id #5",
            thumbnail: "https://www.transparentpng.com/download/adidas-shoes/a4xO3G-adidas-shoes-adidas-shoe-kids-superstar-daddy-grade.png",
            sizes: ["US-MEN-9", "US-MEN-8", "US-MEN-10", "US-MEN-11", "US-MEN-12"]
        },
        {
            id: 6,
            category_id: 8,
            price: 73.05,
            title: "Shoes with id #6",
            thumbnail: "https://www.transparentpng.com/download/adidas-shoes/a4xO3G-adidas-shoes-adidas-shoe-kids-superstar-daddy-grade.png",
            sizes: [
                "US-MEN-9",
                "US-MEN-8",
                "US-MEN-10",
                "US-MEN-11",
                "US-MEN-12",
                "US-MEN-13"
            ]
        },
        {
            id: 7,
            category_id: 8,
            price: 51.96,
            title: "Shoes with id #7",
            thumbnail: "https://www.transparentpng.com/download/adidas-shoes/a4xO3G-adidas-shoes-adidas-shoe-kids-superstar-daddy-grade.png",
            sizes: ["US-MEN-9", "US-MEN-8", "US-MEN-10", "US-MEN-11"]
        },
        {
            id: 8,
            category_id: 8,
            price: 29.35,
            title: "Shoes with id #8",
            thumbnail: "https://www.transparentpng.com/download/adidas-shoes/a4xO3G-adidas-shoes-adidas-shoe-kids-superstar-daddy-grade.png",
            sizes: ["US-MEN-11", "US-MEN-12", "US-MEN-13"]
        },
        {
            id: 9,
            category_id: 8,
            price: 80.0,
            title: "Shoes with id #9",
            thumbnail: "https://www.transparentpng.com/download/adidas-shoes/a4xO3G-adidas-shoes-adidas-shoe-kids-superstar-daddy-grade.png",
            sizes: ["US-MEN-9", "US-MEN-8", "US-MEN-10", "US-MEN-11"]
        },
        {
            id: 10,
            category_id: 8,
            price: 70.07,
            title: "Shoes with id #10",
            thumbnail: "https://www.transparentpng.com/download/adidas-shoes/a4xO3G-adidas-shoes-adidas-shoe-kids-superstar-daddy-grade.png",
            sizes: ["US-MEN-9", "US-MEN-8", "US-MEN-10"]
        },
        {
            id: 11,
            category_id: 8,
            price: 79.37,
            title: "Shoes with id #11",
            thumbnail: "https://www.transparentpng.com/download/adidas-shoes/a4xO3G-adidas-shoes-adidas-shoe-kids-superstar-daddy-grade.png",
            sizes: ["US-MEN-9", "US-MEN-8", "US-MEN-10", "US-MEN-11", "US-MEN-12"]
        },
        {
            id: 12,
            category_id: 8,
            price: 27.14,
            title: "Shoes with id #12",
            thumbnail: "https://www.transparentpng.com/download/adidas-shoes/a4xO3G-adidas-shoes-adidas-shoe-kids-superstar-daddy-grade.png",
            sizes: ["US-MEN-9", "US-MEN-8", "US-MEN-10", "US-MEN-11"]
        }
    ];

    var category_items = []
    $(document).ready(function() {
        $.ajax({
            url: "<?php echo $this->Url->build('/api/product', ['fullBase' => true]); ?>",
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

        let show_sizes_array = []; //Where the filtered sizes get stored


        $(".size-filter-check").click(function() {
            //When a checkbox is clicked
            let size_clicked = $(this).attr("data-size"); //The certain size checkbox clicked
            if ($(this).is(":checked")) {
                show_sizes_array.push(size_clicked); //Was not checked so add to filter array
                showItemsFiltered(); //Show items grid with filters
            } else {
                //Unchecked so remove from the array
                show_sizes_array = show_sizes_array.filter(function(elem) {
                    return elem !== size_clicked;
                });
                showItemsFiltered(); //Show items grid with new filters
            }

            if (!$("input[type=checkbox]").is(":checked")) {
                //No checkboxes are checked
                show_sizes_array = []; //Clear size filter array
                showAllItems(); //Show all items with NO filters applied
            }
        });


        //Mock API data:
        function showAllItems() {
            //Default grid to show all items on page load in
            productItem = '';
            for (let i = 0; i < category_items.length; i++) {
                productItem += ` 
                <div class=" col-sm-3 col-6 " id="productCart_list" >
                    <a href="<?php echo $this->Url->build('/', ['fullBase' => true]); ?>Products/view/${category_items[i]['id']}" >
                        <div class="card product_card1">
                            <img class="border-full" src="<?php echo $this->Url->build('/', ['fullBase' => true]); ?>${category_items[i]['image']}">
                            <div class="card-body p-1">
                                <small class="text-muted">${category_items[i]['title']}</small><br>
                                <b>ราคา :${category_items[i]['price']} บาท</b>
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
                //Go through the items but only show items that have size from show_sizes_array
                if (show_sizes_array.some((v) => category_items[i]["sizes"].includes(v))) {

                    FilteredItem += ` 
                    <div class=" col-sm-3 col-6 " id="productCart_list" >
                        <a href="" >
                            <div class="card product_card1">
                                <img class="border-full" src="${category_items[i]['thumbnail']}">
                                <div class="card-body p-1">
                                    <small class="text-muted">${category_items[i]['title']}</small><br>
                                    <b>ราคา :${category_items[i]['price']} บาท</b>
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