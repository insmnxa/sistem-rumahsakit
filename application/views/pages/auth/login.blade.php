@extends('templates.auth_layout')

@section('content')
   <form action="<?= base_url('index.php/auth/login') ?>" method="POST">
      <div class="mb-3">
         <label for="username" class="form-label">Email address</label>
         <input type="text" name="username" class="form-control" placeholder="username here!" id="username">
      </div>

      <div class="mb-3">
         <label for="password" class="form-label">Password</label>
         <input type="password" class="form-control" name="password" placeholder="password here!" id="password">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
      <div class="form-text">Belum punya akun? <a href="<?= base_url('index.php/auth/register') ?>">Daftar</a>.</div>
   </form>
@endsection
