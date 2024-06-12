@extends('templates.layout')

@section('content')
    <h1 class="text-4xl font-bold mb-4">Obat Manajemen</h1>

    <button class="btn btn-link" type="button" onclick="location.href='<?= base_url('index.php/admin/obat/create') ?>'">Obat
        Baru</button>

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Merk</th>
                    <th>Harga Obat</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data['obats'] as $o)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $o->merk }}</td>
                        <td>{{ $o->harga }}</td>
                        <td>{{ $o->stok }}</td>
                        <td class="flex gap-1">
                            <a href="<?= base_url('index.php/admin/obat/edit/' . $o->id) ?>" class="btn btn-sm btn-warning">
                                edit
                            </a>

                            <form action="<?= base_url('index.php/admin/obat/delete/' . $o->id) ?>" method="post"
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
