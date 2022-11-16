<div class="container">
    <div class="row my-3">
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
                        <th colspan="4">รายการ</th>
                        <th class="text-right">จำนวน</th>
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
                <a class="btn btn-primary" onclick="gotoPayment()">ชำระเงิน</a>
                <!-- <a class="btn btn-primary" href="<?= $this->Url->Build(['controller' => 'cart', 'action' => 'payment']) ?>" onclick="gotoPayment()">ชำระเงิน</a> -->
            </div>
        </div>
    </div>
    <script>
        var productData = "";
        $(document).ready(function() {
            cart();
            $.ajax({
                url: "<?php echo $this->Url->build('/api/product', ['fullBase' => true]); ?>",
                type: "GET",
                dataType: "json", // added data type
                success: function(result) {
                    console.log(result);
                    let productItem = "";
                    for (i = 0; i < result.length; i++) {
                        productData = result[i];
                        let name = result[i].title.replace(/^\s+|\s+$/gm, '');;

                        productItem += ` 
                    <div class="swiper-slide col-sm-4 col-6 product_card" id="productCart_list" >
                        <div class="card ">
                            <img class="border-full" src="<?php echo $this->Url->build('${result[i].image}', ['fullBase' => true]); ?>">
                            <div class="card-body p-1">
                                <small>${result[i].title}</small>
                                <h5 class="text-primary mt-1 m-0 p-0" >35.00 บาท/ชิ้น </h5>
                                <small class="text-muted">ขายแล้ว 1000 ชิ้น</small>
                                <a class="btn btn-primary p-1 w-100 mt-1" onclick="select_product(${result[i].id},'${name}','${result[i].image}',${result[i].id})">เพิ่มในตะกร้าสินค้า</a>
                            </div>
                        </div>
                    </div>`;
                    }
                    $("#product_items").html(productItem);
                },
            });
        });
        var cart_list = []
        var count = 0;

        function select_product(id, name, image, price) {
            count++;
            let pass = true
            for (i = 0; i < cart_list.length; i++) {
                if (cart_list[i].id == id) {
                    cart_list[i].count++;
                    pass = false;
                }
            }
            if (pass) {
                cart_list.push({
                    id: id,
                    img: image,
                    name: name,
                    price: price,
                    count: 1
                })
            }
            cart();
            precal()
        }
        //ตะกร้าสินค้า
        function cart() {
            var productCart_list = ''
            if (cart_list.length > 0) {
                for (i = 0; i < cart_list.length; i++) {
                    if (cart_list[i].count > 0) {
                        productCart_list +=
                            `<div class="d-flex justify-content-between mb-1 py-1 " id="productItem${cart_list[i].id}">
                            <div>
                                <h6 class="text-success">${cart_list[i].name}</h6>
                                <small id="countitems${i}">จำนวน : ${cart_list[i].count} ชิ้น</small>
                            </div>
                            <div>
                                <i class="fas fa-trash-alt" onclick="delete_product(${i},${cart_list[i].id})"></i>
                            </div>
                        </div>
                    </div> `
                    }
                    $("#product_cart").html(productCart_list)
                    $("#cart_total").html(cart_list.length)
                }
            }
            if (cart_list.length <= 0) {
                $("#product_cart").html('ไม่มีสินค้า')
            }
        }

        function numberWithCommas(x) {
            x = x.toString();
            var pattern = /(-?\d+)(\d{3})/;
            while (pattern.test(x))
                x = x.replace(pattern, "$1,$2");
            return x;
        }

        function precal() {
            var precal_sum = 0
            var html = '';
            cart_list.forEach((data) => {
                if (data.count > 0) {
                    precal_sum += data.price * data.count
                    html +=
                        `<tr id="precal${data.id}">
                        <td colspan="4">- ${data.name}</td>
                        <td>${data.count}</td>
                    </tr>`
                    $('#tbody_precal').html(html)
                    $('#precal_sum').html(numberWithCommas((precal_sum).toFixed(2)) + ' บาท')
                    $('#price').val(numberWithCommas((precal_sum).toFixed(2)))
                }
                if (data.count <= 0) {
                    $("#precal" + data.id).remove();
                    $('#precal_sum').html(numberWithCommas((precal_sum).toFixed(2)))
                    $('#price').val(numberWithCommas((precal_sum).toFixed(2)))


                }
            })
        }
        //ลบสินค้า
        function delete_product(i, id) {
            count--;
            if (cart_list[i].count > 0) {
                cart_list[i].count--;
                $("#countitems" + i).text(`จำนวน : ${cart_list[i].count} ชิ้น`)
            }
            if (cart_list[i].count <= 0) {
                $("#productItem" + id).remove();

            }
            precal()
        }
        // ไปหน้าจ่ายเงิน
        function gotoPayment() {

            let totalprice = $('#price').val()

            $.ajax({
                type: 'POST',
                url: '<?php echo $this->Url->build(['controller' => 'cart', 'action' => 'add']); ?>',
                data: {
                    user_id: 1,
                    totalprice: totalprice,
                    c_detail: JSON.stringify(cart_list),
                },
                headers: {
                    'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
                },
                success: function(res) {

                    let resp = JSON.parse(res)
                    if (resp.result = 200) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'เพิ่มสินค้าเรียบร้อย',
                            showConfirmButton: true,
                            confirmButtonText: 'ไปหน้าชำระเงิน',
                        }).then((result) => {
                            window.location.href = `<?= $this->Url->build(['action' => 'payment']) ?>/${resp.cart_token}`
                        })
                    }
                }
            });
        }
    </script>
</div>