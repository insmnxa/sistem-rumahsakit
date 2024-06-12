@extends('templates.layout')

@section('content')
    <h1 class="text-4xl font-bold mb-4">Pasien Manajemen</h1>

    <button class="btn btn-link" type="button"
        onclick="location.href='<?= base_url('index.php/admin/pasien/create') ?>'">Pasien Baru</button>

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>No KTP</th>
                    <th>No Telp</th>
                    <th>Dokter</th>
                    <th>User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data['pasien'] as $p)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->tgl_lahir }}</td>
                        <td>{{ $p->no_ktp }}</td>
                        <td>{{ $p->no_telp }}</td>
                        <td>{{ $p->id_dokter }}</td>
                        <td>{{ $p->id_user }}</td>
                        <td class="flex gap-1">
                            <a href="<?= base_url('index.php/admin/pasien/edit/' . $p->id) ?>" class="btn btn-sm btn-warning">
                                edit
                            </a>

                            <form action="<?= base_url('index.php/admin/pasien/delete/' . $p->id) ?>" method="post"
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
