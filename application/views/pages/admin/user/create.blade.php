@extends('templates.layout')

@section('content')
    <h1 class="text-4xl font-bold mb-4">User Create</h1>

    <button class="btn btn-link" type="button" onclick="location.href='<?= base_url('index.php/admin/user') ?>'">Back</button>

    <form action="<?= base_url('index.php/admin/user/create') ?>" method="post">
        <label class="form-control w-full max-w-sm">
            <div class="label">
                <span class="label-text">Nama</span>
            </div>
            <input type="text" name="nama" placeholder="Nama disini" class="input input-bordered w-full max-w-sm"
                autofocus />
        </label>

        <label class="form-control w-full max-w-sm">
            <div class="label">
                <span class="label-text">Username</span>
            </div>
            <input type="text" name="username" placeholder="Username disini"
                class="input input-bordered w-full max-w-sm" />
        </label>

        <label class="form-control w-full max-w-sm">
            <div class="label">
                <span class="label-text">Password</span>
            </div>
            <input type="password" name="password" class="input input-bordered w-full max-w-sm" />
        </label>

        <label class="form-control w-full max-w-sm">
            <div class="label">
                <span class="label-text">Confirm Password</span>
            </div>
            <input type="passsword" name="confirm_password" class="input input-bordered w-full max-w-sm" />
        </label>

        <button type="submit" class="btn btn-info mt-4">Register</button>
    </form>
@endsection
