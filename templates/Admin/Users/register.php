<body class="text-center">

    <main class="Form-signin">
        <?= $this->Form->create() ?>
        <!-- <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="h3 mb-3 fw-normal">สมัครสมาชิก</h1>

        <?= $this->flash->render() ?>
        <div class="Form-floating mb-2">
            <?= $this->Form->input('name', ['class' => 'Form-control register', 'id' => 'floatingname']) ?>
            <label for="floatingname">Your Name</label>
        </div>
        <div class="Form-floating mb-2">
            <?= $this->Form->input('email', ['class' => 'Form-control', 'id' => 'floatingemail']) ?>
            <label for="floatingemail">Your Email</label>
        </div>
        <div class="Form-floating mb-2">
            <?= $this->Form->password('password', ['class' => 'Form-control', 'id' => 'floatingPassword']) ?>
            <label for="floatingPassword">Your Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>

        <?= $this->Form->button('สมัครสมาชิก', ['class' => 'btn btn-primary submit disabled w-100 mb-2']); ?>
        <?= $this->Html->link('เข้าสู่ระบบ', ['action' => 'login'], ['class' => 'btn btn-secondary w-100 mb-2' ]) ?>

        <!-- <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button> -->
        
        <?= $this->Form->end() ?>

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