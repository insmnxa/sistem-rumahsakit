@extends('templates.layout')

@section('content')
    <h1 class="text-4xl font-bold mb-4">Kategori Obat Manajemen</h1>

    <button class="btn btn-link" type="button"
        onclick="location.href='<?= base_url('index.php/admin/kategori_obat/create') ?>'">Kategori Obat
        Baru</button>

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kategori Obat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data['kategori_obats'] as $ko)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $ko->nama }}</td>
                        <td class="flex gap-1">
                            <a href="<?= base_url('index.php/admin/kategori_obat/edit/' . $ko->id) ?>"
                                class="btn btn-sm btn-warning">
                                edit
                            </a>

                            <form action="<?= base_url('index.php/admin/kategori_obat/delete/' . $ko->id) ?>" method="post"
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
