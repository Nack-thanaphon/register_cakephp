<body class="text-center">

    <main class="form-signin">
        <?= $this->form->create() ?>
        <!-- <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="h3 mb-3 fw-normal">สมัครสมาชิก</h1>

        <?= $this->flash->render() ?>
        <div class="form-floating mb-2">
            <?= $this->Form->input('name', ['class' => 'form-control register', 'id' => 'floatingname']) ?>
            <label for="floatingname">Your Name</label>
        </div>
        <div class="form-floating mb-2">
            <?= $this->Form->input('email', ['class' => 'form-control', 'id' => 'floatingemail']) ?>
            <label for="floatingemail">Your Email</label>
        </div>
        <div class="form-floating mb-2">
            <?= $this->Form->password('password', ['class' => 'form-control', 'id' => 'floatingPassword']) ?>
            <label for="floatingPassword">Your Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>

        <?= $this->form->button('สมัครสมาชิก', ['class' => 'btn btn-primary submit disabled']); ?>
        <?= $this->Html->link('เข้าสู่ระบบ', ['action' => 'login'], ['class' => 'btn btn-secondary']) ?>

        <!-- <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button> -->
        <p class="mt-5 mb-3 text-muted">© Buid with CakePhp4 | Nack_thanaphon</p>
        <?= $this->form->end() ?>

    </main>

</body>


<script>
    $('.register').change(function() {
        let value = $('.register').val()
        if (value) {
            $('.submit').removeClass('disabled')
        }else{
            $('.submit').addClass('disabled')
        }
    })
</script>