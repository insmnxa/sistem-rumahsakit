@extends('templates.layout')

@section('content')
    <h1 class="text-4xl font-bold mb-4">Spesialisasi Edit</h1>

    <button class="btn btn-link" type="button"
        onclick="location.href='<?= base_url('index.php/admin/spesialisasi') ?>'">Back</button>

    <form action="<?= base_url('index.php/admin/spesialisasi/edit/' . $data['spesialisasi']->id) ?>" method="post">
        <label class="form-control w-full max-w-sm">
            <div class="label">
                <span class="label-text">Spesialisasi</span>
            </div>
            <input type="text" name="nama" value="<?= $data['spesialisasi']->nama ?>" placeholder="Spesialisasi disini"
                class="input input-bordered w-full max-w-sm" autofocus />
        </label>

        <button type="submit" class="btn btn-info mt-4">Create</button>
    </form>
@endsection
