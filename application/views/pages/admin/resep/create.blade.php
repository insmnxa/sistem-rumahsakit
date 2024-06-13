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

<h1 class="text-4xl font-bold">Detail Pasien</h1>
<a href="<?= base_url('index.php/admin/resep/') ?>" class="btn btn-link">Back</a>

    <form action="<?= base_url('index.php/admin/resep/store/') ?>" method="post">
    <div class="mb-4 flex gap-x-4">
        <div class="inline-block w-6/12">
            <div class="mb-1">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Tgl Peresepan</span>
                    </div>
                    <input type="text" value="<?= date('d-m-Y') ?>" class="input input-sm input-bordered w-full" readonly />
                </label>
            </div>

            <div class="mb-1">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Dokter</span>
                    </div>
                    <input type="text" value="<?= $data['pasien']->id_dokter ?>" class="input input-sm input-bordered w-full" readonly />
                </label>
            </div>
        </div>

        <div class="inline-block w-6/12">
            <div class="mb-1">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Diagnosa</span>
                    </div>
                    <input type="text" class="input input-sm input-bordered w-full" readonly />
                </label>
            </div>

            <div class="mb-1">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Pasien</span>
                    </div>
                    <input type="text" value="<?= $data['pasien']->nama ?>" class="input input-sm input-bordered w-full"  readonly />
                </label>
            </div>
        </div> 
    </div>


    <h1 class="text-4xl font-bold mt-4">Detail Resep</h1>

    <div class="overflow-x-auto">
    <table class="table">
        <thead>
        <tr>
            <th>Kode</th>
            <th>Obat</th>
            <th>Harga</th>
            <th>Satuan</th>
            <th>Jumlah</th>
            <th>Sub Total</th>
            <th>
                <button type="button" class="btn btn-sm btn-info text-white" id="tambah-obat">tambah</button>
            </th>
        </tr>
        </thead>
        <tbody id="obat-table">
                <tr>
                    <td>
                        <input type="text" name="obat[]" class="input input-sm input-bordered w-full max-w-xs" />
                    </td>
                    <td>
                        <input type="text" disabled class="input input-sm input-bordered w-full max-w-xs" />
                    </td>
                    <td>
                        <input type="text" value="Rp 20.000,-" class="input input-sm input-bordered w-full max-w-xs" disabled />
                    </td>
                    <td>
                        <select name="satuan" class="select select-bordered select-sm w-full max-w-xs">
                            <option disabled selected>Satuan</option>
                            <option value="pcs">Pcs</option>
                            <option value="kpl">Kapsul</option>
                            <option value="tbl">Tablet</option>
                            <option value="btl">Botol</option>
                        </select>
                    </td>
                    <td>
                        <input type="number" name="qty[]" class="input input-sm input-bordered max-w-24" />
                    </td>
                    <td>
                        <input type="text" name="sub_total[]" class="input input-sm input-bordered max-w-24" readonly />
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm delete-obat">delete</button>
                    </td>
                </tr>
        </tbody>
    </table>


            {{-- <tr>
                <td colspan="8">
                    <div class="flex gap-x-4">
                        <span class="w-full bg-yellow-400 h-4"></span>
                        <span class="w-full bg-yellow-200 h-4"></span>
                    </div>
                </td>
            </tr> --}}

            {{-- <tr>
                <td></td>
                <td colspan="2">
                    <label class="form-control w-full">
                        <div class="label">
                        <span class="label-text text-lg font-bold">Total Harga</span>
                        </div>
                        <input type="text" name="total_harga" value="Rp 40.000,-" class="input input-sm input-bordered w-full text-right font-bold" readonly />
                    </label>
                </td>
            </tr> --}}

            {{-- <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-sm btn-success text-white">Save</button>
                </td>
            </tr> --}}
        </form>


</div>

<script>
    $(document).ready(function () {
    
        $('#tambah-obat').on('click', function () {
            let newObatRow = $('#obat-table tr:first').clone();

            newObatRow.find('input[type="text"], input[type="number"]').val('');
            newObatRow.find('select').prop('selectedIndex', 0);

            $('#obat-table').append(newObatRow);

            console.log($('#obat-table').children().length);
        });

        $(document).on('click', '.delete-obat', function () {
            if ($(this).closest('tr').index() !== 0) {
                $(this).closest('tr').remove();
            }
        });
    });
</script>
@endsection