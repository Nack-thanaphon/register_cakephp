<div class="container-fluid">
    <div class="row m-0 p-0 h-screen">
        <nav class="d-flex justify-content-between mt-3">
            <a>Document</a>
            <div class="btn btn-success">สมัครสมาชิก</div>
        </nav>
        <div class="col-12 mt-4 text-center">
            <h1 class="text-success fw-bold">Dog API</h1>
            <h6>สมัครสมาชิกเพื่อรับสิทธิ์ใช้งาน Dog API
                มากกว่า 100 สายพันธ์</h6>
        </div>
        <div class="col-12">
            <div class="card  shadow-sm my-3 p-4">
                <h1 class="text-center fw-bold">Login</h1>
                <h6 class="text-center">เข้าสู่ระบบ</h6>
                <form>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email">
                        <div id="emailHelp" class="form-text text-danger" hidden>We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Your Password">
                    </div>
                    <!-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                </form>
                <button id="submit" onclick="login()" class="btn btn-success w-100 rounded-pill">
                    <h4>
                        เข้าสู่ระบบ
                    </h4>
                </button>
                <p class="m-0 pt-3 text-center">
                    ต้องการ <a href="<?= $html->link('Home', array('controller'=>'notes','action'=>'index')); ?>">สมัครสมาชิก ?</a>
                </p>
                <hr>
                <p class="text-center mt-4">หรือ</p>
                <div class="row m-0 p-0">
                    <div class="col-sm-6 col-12">
                        <button class="btn btn-primary  rounded-pill w-100 mb-2">Facebook</button>
                    </div>
                    <div class="col-sm-6 col-12">
                        <button class="btn btn-danger  rounded-pill w-100 mb-2">Google</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function login() {
        //  let id = document.getElementById('submit')
        Swal.fire({
            icon: 'error',
            title: 'เกิดข้อผิดพลาด',
            text: 'ระบบไม่สามารถใช้ได้ในขณะนี้',
            footer: '<a href="">ต้องการติดต่อผู้ดูแล ?</a>'
        })
    }
</script>