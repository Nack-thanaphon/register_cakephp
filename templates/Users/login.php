

<body class="text-center">

  <main class="form-signin">
    <?= $this->form->create() ?>
    <!-- <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <h1 class="h3 mb-3 fw-normal">เข้าสู่ระบบ</h1>

    <?= $this->flash->render() ?>
    <div class="form-floating mb-2">
      <?= $this->Form->input('email', ['class' => 'form-control','id' => 'floatingInput']) ?>

      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mb-2">
      <?= $this->Form->password('password', ['class' => 'form-control'],['id' => 'floatingPassword']) ?>
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <?= $this->form->button('เข้าสู่ระบบ', ['class' => 'btn btn-primary']); ?>
    <?= $this->Html->link('สมัครสมาชิก', ['action' => 'register'],['class' => 'btn btn-secondary']) ?>


    <!-- <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button> -->
    <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
    <?= $this->form->end() ?>

  </main>





</body>