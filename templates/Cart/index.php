<div class="col-12 py-5">
    <h1>ตะกร้าสินค้า</h1>
    <div class="" style="overflow:hidden;">
        <div class="swiper-container mySwiper p-3 ">
            <div class="swiper-wrapper" id="product_items">
            </div>
            <!-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div> -->
        </div>
        <!-- <div class="swiper-pagination"></div> -->
    </div>


    <div class="row m-0 ">
        <div class="col-12 col-sm-8">
            <div class="m-1 h-100 card border shadow-sm  p-3">
                <h4>รายการสินค้า</h4>
                <div class="col-12 p-0" id="product_cart">
                    <!-- <div class="row m-0 p-1 border">
                  <div class="">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            src="./img/2.jpg"
                            class="img-fluid rounded-3"
                            alt="Shopping item"
                            style="width: 65px"
                          />
                        </div>
                        <div class="ms-3">
                          <h6>Iphone 11 pro</h6>
                          <p class="small mb-0">256GB, Navy Blue</p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px">
                          <h5 class="fw-normal mb-0">2</h5>
                        </div>
                        <div style="width: 80px">
                          <h5 class="mb-0">$900</h5>
                        </div>
                        <a href="#!" style="color: #cecece"
                          ><i class="fas fa-trash-alt"></i
                        ></a>
                      </div>
                    </div>
                  </div>
                </div> -->
                </div>

            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="m-1  card  p-3 text-dark">
                <h4 class="mb-1">ยอดรวมชำระ</h4>
                <p class="p-0 m-0"></p>
                <hr class="m-0 my-2">
                <table>
                    <tr>
                        <th colspan="4">รายการ</th>
                        <th>จำนวน</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td colspan="4">อโวคาโด</td>
                            <td>3</td>
                        </tr>
                    </tbody>
                </table>



                <div class="dropdown-divider"></div>
                <div class="d-flex justify-content-between">
                    <h6 class="mb-3">ยอดรวมชำระ</h6>
                    <h4 class="mb-3">500.00</h4>
                </div>
                <div class="btn btn-primary" onclick="gotoPayment()">ชำระเงิน</div>
            </div>
        </div>
    </div>
</div>


<script>
    var swiper = new Swiper(".mySwiper", {
        lazy: true,
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
        },
        // navigation: {
        //     nextEl: ".swiper-button-next",
        //     prevEl: ".swiper-button-prev",
        // },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 50,
            },
        }
    });

    var productData = "";

    $(document).ready(function() {
        $.ajax({
            url: "<?php echo $this->Url->build('/api/product', ['fullBase' => true]); ?>",
            type: "GET",
            dataType: "json", // added data type
            success: function(result) {
                let productItem = "";
                for (i = 0; i < result.length; i++) {

                    productData = result[i];
                    productItem += ` 
                    <div class="swiper-slide" id="productCart_list" >
                        <div class="card ">
                        <img class="w-100 border-full" src="<?php echo $this->Url->build('${result[i].p_image_id}', ['fullBase' => true]); ?>">
                            <div class="card-body">
                                <small>${result[i].productstype['pt_name']}</small>
                                <h5 >${result[i].p_title}</h5>
                                <a href="#" class="btn btn-primary" onclick="select_product(${result[i].p_id},'${result[i].p_title}','${result[i].p_image_id}',${result[i].p_id})" >เพิ่มในตะกร้าสินค้า</a>
                            </div>
                        </div>
                    </div>`;

                }

                $("#product_items").html(productItem);
            },
        });
    });



    var cart_list = []

    function select_product(product_id, product_name, product_img, product_price) {

        let pass = true
        for (i = 0; i < cart_list.length; i++) {
            if (cart_list[i].id == product_id) {
                cart_list[i].count++;
                pass = false;
            }
        }
        if (pass) {
            cart_list.push({
                id: product_id,
                img: product_img,
                name: product_name,
                price: product_price,
                count: 1
            })
        }
        cart();
    }

    function cart() {
        var productCart_list = ''

        if (cart_list.length > 0) {
            for (i = 0; i < cart_list.length; i++) {
                if (cart_list[i].count > 0) {
                    productCart_list +=
                        `
                <div class="row m-0 mb-2 p-1 border" id="productItem${cart_list[i].id}">
                        <div class="col-3 ">
                          <img
                          src="<?php echo $this->Url->build('${cart_list[i].img}', ['fullBase' => true]); ?>"
                            class="img-fluid rounded-3 m-1 w-100"
                            alt="Shopping item"
                          />
                        </div>
                          
                        <div class="col-8  ">
                          <h4>${cart_list[i].name}</h4>
                          <h5 class="mb-0">ราคา : ${cart_list[i].price}</h5>
                          <p id="countitems${i}"> จำนวน :${cart_list[i].count}</p>
                        </div>
                        <div class="col-1 d-flex justify-content-end "> 
                            <a href="#!" style="color: #cecece">
                            <i class="fas fa-trash-alt" onclick="delete_product(${i},${cart_list[i].id})"></i>
                            </a>
                        </div>
                 
                </div> `
                }
                $("#product_cart").html(productCart_list)
                $("#cart_total").html(cart_list.length)

            }
        } else {
            $("#product_cart").html('<p>ไม่มีสินค้า</p>')
        }
    }

    function delete_product(index, id) {
        if (cart_list[index].count > 0) {
            cart_list[index].count--;
            $("#countitems" + index).text(cart_list[index].count)
        }
        if (cart_list[index].count <= 0) {
            $("#productItem" + id).remove();
        }
    }

    function gotoPayment() {
        $.ajax({
            type: 'POST',
            url: '<?php echo $this->Url->build(['controller' => 'cart', 'action' => 'add']); ?>',
            data: {
                user_id: 1,
                c_detail: JSON.stringify(cart_list),
            },
            headers: {
                'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
            },
            success: function() {

            }
        });
    }
</script>