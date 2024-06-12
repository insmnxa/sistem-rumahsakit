@extends('templates.auth_layout')

@section('content')
   <form action="<?= base_url('index.php/auth/register') ?>" method="POST">
      <div>
         <label for="nama">Name</label><br>
   	   <input type="text" id="nama" name="nama" placeholder="Nama here"></input>
      </div>
      <br> 
      <div>
         <label for="username">Username</label><br>
   	   <input type="text" id="username" name="username" placeholder="Username here"></input>
      </div>
      <br>
      <div>
         <label for="password">Password</label><br>
   	   <input type="password" id="password" name="password" placeholder="Password here"></input>
      </div>
      <br>
      <div>
         <label for="confirm_password">Confirm Password</label><br>
   	   <input type="confirm_password" id="confirm_password" name="confirm_password" placeholder="Confrim password here"></input>
      </div>

      <br>
      <button type="submit">Register</button>
      <small>Sudah punya akun? <a href="<?= base_url('index.php/auth/login') ?>">Masuk</a>.</small>
   </form>
@endsection
