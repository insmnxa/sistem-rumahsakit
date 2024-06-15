@extends('templates.layout')

@section('content')
    <h1 class="text-4xl font-bold mb-4">User Manajemen</h1>

    <button class="btn btn-link" type="button" onclick="location.href='<?= base_url('index.php/admin/user/create') ?>'">User
        Baru</button>

    <div class="overflow-x-auto">
        <table class="table table-xs">
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data['users'] as $u)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $u->nama }}</td>
                        <td>{{ $u->username }}</td>
                        <td>
                            @if (intval($u->is_active) === 0)
                                <div class="badge badge-error gap-2">
                                    inactive
                                </div>
                            @else
                                <div class="badge badge-success gap-2">
                                    active
                                </div>
                            @endif
                        </td>
                        <td class="flex gap-1">
                            <a href="<?= base_url('index.php/admin/user/edit/' . $u->id) ?>" class="btn btn-sm btn-warning">
                                edit
                            </a>

                            <form action="<?= base_url('index.php/admin/user/delete/' . $u->id) ?>" method="post"
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
