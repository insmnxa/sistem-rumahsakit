@extends('templates.layout')

@section('content')
    <h1 class="text-4xl font-bold mb-4">Obat Create</h1>

    <button class="btn btn-link" type="button" onclick="location.href='<?= base_url('index.php/admin/obat') ?>'">Back</button>

    <form action="<?= base_url('index.php/admin/obat/create') ?>" method="post">
        <label class="form-control w-full max-w-sm">
            <div class="label">
                <span class="label-text">Merk</span>
            </div>
            <input type="text" name="merk" value="<?= set_value('merk') ?>" placeholder="Merk disini"
                class="input input-bordered w-full max-w-sm" autofocus />
            <?= form_error('merk') ?>
        </label>

        <label class="form-control w-full max-w-sm">
            <div class="label">
                <span class="label-text">Harga Obat</span>
            </div>
            <input type="number" name="harga" value="<?= set_value('harga') ?>" placeholder="Harga Obat"
                class="input input-bordered w-full max-w-sm" autofocus />
            <?= form_error('harga') ?>
        </label>

        <label class="form-control w-full max-w-sm">
            <div class="label">
                <span class="label-text">Stok</span>
            </div>
            <input type="number" name="stok" value="<?= set_value('stok') ?>" placeholder="Stok disini"
                class="input input-bordered w-full max-w-sm" autofocus />
            <?= form_error('stok') ?>
        </label>

        <div class="mt-3">
            <select name="id_kategori" class="select select-bordered w-full max-w-xs">
                <option disabled selected>Kategori Obat</option>
                @foreach ($data['kategori_obats'] as $ko)
                    <option value="<?= $ko->id ?>"><?= $ko->nama ?></option>
                @endforeach
            </select>
            <?= form_error('id_kategori') ?>
        </div>

        <button type="submit" class="btn btn-info mt-4">Tambah</button>
    </form>
@endsection
