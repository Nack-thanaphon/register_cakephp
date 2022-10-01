<body class="text-center">
    <main class="form-signin">
        <!-- <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="h3 mb-3 fw-normal">ลืมรหัสผ่าน</h1>
        
        <?= $this->flash->render() ?>
        
        <?= $this->form->create() ?>
        <div class="form-floating mb-2">
            <?= $this->Form->input('email', ['class' => 'form-control', 'id' => 'floatingemail']) ?>
            <label for="floatingemail">Your Email</label>
        </div>
        
        <?= $this->form->button('เปลี่ยนรหัสผ่าน', ['class' => 'btn btn-secondary']) ?>

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