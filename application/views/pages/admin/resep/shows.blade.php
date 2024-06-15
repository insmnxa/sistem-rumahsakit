@extends('templates.layout')

@section('content')
<h1 class="text-4xl font-bold mb-4">Antrean Pasien</h1>

<div class="overflow-x-auto">
    <table class="table table-xs">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Resep</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Waktu Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($data['resep'] as $r)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $r->ri }}</td>
                    <td>{{ $r->pa }}</td>
                    <td>{{ $r->da }}</td>
                    <td>{{ $r->dibuat_pada }}</td>
                    <td class="flex gap-1">
                        <a href="<?= base_url('index.php/admin/resep/print/' . $r->ri) ?>" class="btn btn-sm btn-warning">cetak</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection