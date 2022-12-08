<div class="container">
    <div class="row m-1 my-3">
        <div class="col-12  py-3">

            <h1>ตะกร้าสินค้า</h1>
        </div>
        <div class="col-12 col-sm-8 m-0 p-0" style="overflow:hidden;">
            <div class="row m-0 p-0" id="product_items">
            </div>
        </div>
        <div class="col-12 col-sm-4 m-0 p-0">
            <div class="m-1 card border shadow-sm  p-3">
                <h4>รายการสินค้า</h4>
                <div class="col-12 p-0" id="product_cart">
                </div>
            </div>
            <div class="m-1  card  p-3 text-dark">
                <h4 class="mb-1">ยอดรวมชำระ</h4>
                <p class="p-0 m-0"></p>
                <table>
                    <tr class="m-0 p-0">
                        <th colspan="4" class="text-muted">รายการ</th>
                        <th class="text-right text-muted">จำนวน</th>
                    </tr>
                    <hr>
                    <tbody id="tbody_precal">
                        <!-- <tr>
                                <td colspan="4">อโวคาโด</td>
                                <td>3</td>
                            </tr> -->
                    </tbody>
                </table>
                <div class="dropdown-divider"></div>
                <div class="d-flex justify-content-between">
                    <h6 class="mb-3">ยอดรวมชำระ</h6>
                    <h4 class="mb-3" id="precal_sum"></h4>
                    <input type="hidden" id="price" value="">
                </div>
                <button class="btn btn-primary" id="gotopayment" onclick="gotoPayment()" disabled>ชำระเงิน</button>
                <!-- <a class="btn btn-primary" href="<?= $this->Url->Build(['controller' => 'cart', 'action' => 'payment']) ?>" onclick="gotoPayment()">ชำระเงิน</a> -->
            </div>
        </div>
    </div>
    <script>
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
                        let name = result[i].title.replace(/^\s+|\s+$/gm, '');;

                        productItem += ` 
                    <div class="swiper-slide col-sm-4 col-6 product_card" id="productCart_list" >
                        <div class="card ">
                            <img class="border-full" src="<?php echo $this->Url->build('${result[i].image}', ['fullBase' => true]); ?>">
                            <div class="card-body p-1">
                                <h5 class="col-12 text-truncate  my-2 m-0 p-0 text-right">${result[i].title}</h5>
                                <div class="text-right m-0 p-0">
                                <h5 class="text-primary mt-1 m-0 p-0 ">${result[i].price} บาท/ชิ้น </h5>
                                <small class="text-muted text-right m-0 p-0">ในคลัง ${result[i].total} ชิ้น</small>
                                </div>
                                <a class="btn btn-primary p-1 w-100 mt-1" onclick="select_product(${result[i].id},'${name}','${result[i].image}',${result[i].price})">เพิ่มในตะกร้าสินค้า</a>
                            </div>
                        </div>
                    </div>`;
                    }
                    $("#product_items").html(productItem);
                },
            });
        });

        //ตะกร้าสินค้า


        // ไปหน้าจ่ายเงิน
        function gotoPayment() {

            let totalprice = $('#price').val()

            $.ajax({
                type: 'POST',
                url: '<?php echo $this->Url->build(['controller' => 'cart', 'action' => 'add']); ?>',
                data: {
                    totalprice: totalprice,
                    c_detail: JSON.stringify(cart_list),
                },
                headers: {
                    'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
                },
                success: function(res) {
                    let resp = JSON.parse(res)
                    localStorage.setItem("orders_token", resp.orders_token);
                    if (resp.result == 200) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'เพิ่มสินค้าเรียบร้อย',
                            showConfirmButton: true,
                            confirmButtonText: 'ไปหน้าชำระเงิน',
                        }).then((result) => {
                            window.location.href = "<?= $this->Url->build(['controller' => 'users', 'action' => 'login']) ?>"
                        })
                    }
                    if (resp.result == 304) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'กรุณาเข้าสู่ระบบ',
                            showConfirmButton: true,
                            confirmButtonText: 'ไปหน้าเข้าสู่ระบบ',
                        }).then((result) => {
                            window.location.href = "<?= $this->Url->build(['controller' => 'users', 'action' => 'login']) ?>"
                        })
                    }
                }
            });
        }
    </script>
</div>