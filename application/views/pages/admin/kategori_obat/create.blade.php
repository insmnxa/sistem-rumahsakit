@extends('templates.layout')

@section('content')
    <h1 class="text-4xl font-bold mb-4">Kategori Obat Create</h1>

    <button class="btn btn-link" type="button"
        onclick="location.href='<?= base_url('index.php/admin/kategori_obat') ?>'">Back</button>

    <form action="<?= base_url('index.php/admin/kategori_obat/create') ?>" method="post">
        <label class="form-control w-full max-w-sm">
            <div class="label">
                <span class="label-text">Nama Kategori</span>
            </div>
            <input type="text" name="nama" placeholder="Kategori obat disini"
                class="input input-bordered w-full max-w-sm" autofocus />
        </label>

        <button type="submit" class="btn btn-info mt-4">Create</button>
    </form>
@endsection
