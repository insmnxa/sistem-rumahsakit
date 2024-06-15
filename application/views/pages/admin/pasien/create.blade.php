@extends('templates.layout')

@section('content')
    <style>
        /* Style for the dropdown container */
        .dropdown-container {
            position: relative;
            display: inline-block;
        }

        /* Style for the dropdown */
        .dropdown-kategori {
            position: absolute;
            top: 100%; /* Position it below the input */
            left: 0;
            background-color: #f9f9f9;
            min-width: 100px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 8px 0;
            z-index: 1; /* Ensure it's above other elements */
        }

        /* Style for dropdown items */
        .dropdown-item {
            padding: 8px 16px;
            display: block;
            text-decoration: none;
            color: #333;
            cursor: pointer;
        }

        /* Style for dropdown items on hover */
        .dropdown-item:hover {
            background-color: #ddd;
        }
    </style>

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
            <input type="text" name="no_telp" value="<?= set_value('no_telp') ?>" placeholder="No Telepon disini"
                class="input input-bordered w-full max-w-sm" />
            <?= form_error('no_telp') ?>
        </label>

        <label class="form-control w-full max-w-sm dropdown-container">
            <div class="label">
                <span class="label-text">Kategori</span>
            </div>
            <input type="text" id="kategori" name="dokter" value="<?= set_value('dokter') ?>"
                placeholder="Stok disini" class="input input-bordered w-full max-w-sm" autocomplete="off" autofocus />
            <div id="kategori_list" class="dropdown-kategori hidden flex flex-col"></div>
            <?= form_error('dokter', '<div class="badge badge-error gap-2 mt-2">', '</div>') ?>
        </label>

        <button type="submit" class="btn btn-info mt-4">Register</button>
    </form>

    <script>
        $(document).ready(function() {
    
            $("#kategori").keyup(function() {
                $('#kategori_list').removeClass('hidden');
                let query = $(this).val();
                if (query != '') {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url() ?>index.php/admin/dokter/fetch",
                        data: {search:query},
                        success: function(data) {
                            $arr = JSON.parse(data);

                            $('#kategori_list').fadeIn();
                            $('#kategori_list').html(function () {
                                let htmlElement = '';

                                $arr.forEach(a => {
                                    htmlElement +=  "<button type='button'><div class='dropdown-item text-sm text-left'>" + a.nama + "</div></button>";
                                });

                                console.log(htmlElement);
                                return htmlElement;
                            });
                        }
                    });
                } else {
                    $('#kategori_list').addClass('hidden');
                }
            });
    
            $(document).on('click', '.dropdown-kategori div', function() {
                $('#kategori').val($(this).text());
                $('#autocomplete').fadeOut();
                $('#kategori_list').addClass('hidden');
            })
        });
    </script>
@endsection
