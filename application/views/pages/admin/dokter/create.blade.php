@extends('templates.layout')

@section('content')
    <h1 class="text-4xl font-bold mb-4">Dokter Create</h1>

    <button class="btn btn-link" type="button"
        onclick="location.href='<?= base_url('index.php/admin/dokter') ?>'">Back</button>

    <form action="<?= base_url('index.php/admin/dokter/create') ?>" method="post">
        <label class="form-control w-full max-w-sm">
            <div class="label">
                <span class="label-text">Nama</span>
            </div>
            <input type="text" name="nama" value="<?= set_value('nama') ?>" placeholder="Nama disini"
                class="input input-bordered w-full max-w-sm" autofocus />
            <?= form_error('nama') ?>
        </label>

        <label class="form-control w-full max-w-sm">
            <div class="label">
                <span class="label-text">NIP</span>
            </div>
            <input type="text" name="nip" value="<?= set_value('nip') ?>" placeholder="NIP disini"
                class="input input-bordered w-full max-w-sm" />
            <?= form_error('nip') ?>
        </label>

        <label class="form-control w-full max-w-sm">
            <div class="label">
                <span class="label-text">Alamat</span>
            </div>
            <textarea class="textarea textarea-bordered" name="alamat" placeholder="Jl Stasiun Manggarai4"><?= set_value('alamat') ?></textarea>
            <?= form_error('alamat') ?>
        </label>

        <label class="form-control w-full max-w-sm">
            <div class="label">
                <span class="label-text">No Telepon</span>
            </div>
            <input type="text" name="no_telp" value="<?= set_value('no_telp') ?>" placeholder="No Telepon disini"
                class="input input-bordered w-full max-w-sm" />
            <?= form_error('no_telp') ?>
        </label>

        <div class="mt-3">
            <select name="id_spesialisasi" class="select select-bordered w-full max-w-xs">
                <option disabled selected>Spesialisasi</option>
                @foreach ($data['spesialisasi'] as $s)
                    <option value="<?= $s->id ?>"><?= $s->nama ?></option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-info mt-4">Register</button>
    </form>
@endsection
