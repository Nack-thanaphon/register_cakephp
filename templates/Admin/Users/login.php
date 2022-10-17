<script>
  function preventBack() {
    window.history.forward()
  };
  setTimeout("preventBack()", 0);
  window.onload = function() {
    null
  };
</script>

<div class="login-box my-5 mx-auto">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b class="text-success">แม่ปลูก</b>ลูกขาย</a>
    </div>
    <div class="card-body">
      <?= $this->flash->render() ?>
      <p class="login-box-msg">Sign in to start your session</p>
      <?= $this->Form->create() ?>
      <div class="input-group mb-3">
        <?= $this->Form->input('email', ['class' => 'Form-control', 'placeholder' => 'email']) ?>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <?= $this->Form->password('password', ['class' => 'Form-control', 'placeholder' => 'password']) ?>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="row m-0 p-0">
        <div class="col-7 m-0 p-0">
          <div class="icheck-primary">
            <input type="checkbox" id="remember">
            <label for="remember">
              Remember Me
            </label>
          </div>
        </div>
        <div class="col-5 m-0 p-0">
          <?= $this->Form->button('เข้าสู่ระบบ', ['class' => "btn btn-primary btn-block"]); ?>
        </div>
      </div>
      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger" id="googlelogin">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>

      <p class="mb-1">

        <?= $this->Html->link('ลืมรหัสผ่าน?', ['action' => 'forgetpassword']) ?>
      </p>
      <p class="mb-0">
        <?= $this->Html->link('สมัครสมาชิก', ['action' => 'register'], ['class' => 'text-center']) ?>

      </p>
      <?= $this->Form->end() ?>
    </div>

  </div>






  <script src="https://www.gstatic.com/firebasejs/4.5.0/firebase.js"></script>

  <script>
    const Config = {
      apiKey: "AIzaSyBqTO2sznTFt81a0ZGo8BeIPROjXHFfxLY",
      authDomain: "realtime-chat-12332.firebaseapp.com",
      projectId: "realtime-chat-12332",
      storageBucket: "realtime-chat-12332.appspot.com",
      messagingSenderId: "424933598885",
      appId: "1:424933598885:web:4a6b8c9d67da6403950f4c",
      measurementId: "G-0NYGLHJCJZ"
    };

    firebase.initializeApp(Config);


    $('#googlelogin').click(function() {
      const GoogleAuthProvider = new firebase.auth.GoogleAuthProvider();
      firebase.auth().signInWithPopup(GoogleAuthProvider)
      firebase.auth().onAuthStateChanged(function(user) {
        console.log(user)
      });
    })


    $("#googlelogout").click(function() {
      //คำสั่ง ออกจการะบบ ของ firebase
      firebase.auth().signOut().then(function() {});

    });
  </script>