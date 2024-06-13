@extends('templates.layout')

@section('content')
    <h1 class="text-4xl font-bold mb-4">Pasien Manajemen</h1>

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>No KTP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data['pasiens'] as $p)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->tgl_lahir }}</td>
                        <td>{{ $p->no_ktp }}</td>
                        <td class="flex gap-1">
                            <a href="<?= base_url('index.php/admin/resep/create/' . $p->id) ?>" class="btn btn-sm btn-success">Buat resep</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
