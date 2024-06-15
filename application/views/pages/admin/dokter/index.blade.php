@extends('templates.layout')

@section('content')
    <h1 class="text-4xl font-bold mb-4">Dokter Manajemen</h1>

    <button class="btn btn-link" type="button"
        onclick="location.href='<?= base_url('index.php/admin/dokter/create') ?>'">Dokter
        Baru</button>

    <div class="overflow-x-auto">
        <table class="table table-xs">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Spesialisasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data['dokters'] as $d)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->nip }}</td>
                        <td>{{ $d->alamat }}</td>
                        <td>{{ $d->no_telp }}</td>
                        <td>{{ $d->id_spesialisasi }}</td>
                        <td class="flex gap-1">
                            <a href="<?= base_url('index.php/admin/dokter/edit/' . $d->id) ?>" class="btn btn-sm btn-warning">
                                edit
                            </a>

                            <form action="<?= base_url('index.php/admin/dokter/delete/' . $d->id) ?>" method="post"
                                onsubmit="return confirm('Konirmasi hapus data')">
                                <button type="submit" class="btn btn-sm btn-error">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
