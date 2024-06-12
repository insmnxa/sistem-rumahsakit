@extends('templates.layout')

@section('content')
    <h1 class="text-4xl font-bold mb-4">Pasien Create</h1>

    <button class="btn btn-link" type="button"
        onclick="location.href='<?= base_url('index.php/admin/pasien') ?>'">Back</button>

    <form action="<?= base_url('index.php/admin/pasien/create') ?>" method="post">
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
                <span class="label-text">Tanggal Lahir</span>
            </div>
            <input type="date" name="tgl_lahir" value="<?= set_value('tgl_lahir') ?>"
                class="input input-bordered w-full max-w-sm" />
            <?= form_error('tgl_lahir') ?>
        </label>

        <label class="form-control w-full max-w-sm">
            <div class="label">
                <span class="label-text">No KTP</span>
            </div>
            <input type="text" name="no_ktp" value="<?= set_value('no_ktp') ?>" placeholder="No KTP disini"
                class="input input-bordered w-full max-w-sm" />
            <?= form_error('no_ktp') ?>
        </label>

        <label class="form-control w-full max-w-sm">
            <div class="label">
                <span class="label-text">No Telp</span>
            </div>
            <input type="text" name="no_telp" value="<?= set_value('no-telp') ?>" placeholder="No Telepon disini"
                class="input input-bordered w-full max-w-sm" />
            <?= form_error('no_telp') ?>
        </label>

        <div class="mt-3">
            <select name="id_dokter" class="select select-bordered w-full max-w-sm">
                <option disabled selected>Dokter yang bersangkutan</option>
                @foreach ($data['dokter'] as $d)
                    <option value="<?= $d->id ?>"><?= $d->nama ?></option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-info mt-4">Register</button>
    </form>
@endsection
