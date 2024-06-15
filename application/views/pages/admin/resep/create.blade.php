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

    <form action="<?= base_url('index.php/admin/resep/store/' . $data['pasien']->id) ?>" method="post">
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
                    <input type="text" name="id_dokter" value="<?= $data['pasien']->id_dokter ?>" class="input input-sm input-bordered w-full" readonly />
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
    <table class="table table-xs">
        <thead>
        <tr>
            <th>Obat</th>
            <th>Kode</th>
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
                        <input type="text" id="nama_1" data-row="1" class="kategori input input-sm input-bordered w-full max-w-xs" autocomplete="off" />
                        <div id="kategori_list" class="dropdown-kategori ml-4 hidden flex flex-col"></div>
                    </td>
                    <td>
                        <input type="text" name="kode[]" id="kode_1" class="input input-sm input-bordered w-full max-w-xs" readonly />
                        <?php echo form_error('kode[]'); ?>
                    </td>
                    <td>
                        <input type="text" value="Rp 20.000,-" id="harga_1" class="input input-sm input-bordered w-full max-w-xs" disabled />
                    </td>
                    <td>
                        <select name="satuan[]" class="select select-bordered select-sm w-full max-w-xs">
                            <option disabled selected>Satuan</option>
                            <option value="pcs">Pcs</option>
                            <option value="kpl">Kapsul</option>
                            <option value="tbl">Tablet</option>
                            <option value="btl">Botol</option>
                        </select>
                        <?php echo form_error('satuan[]'); ?>
                    </td>
                    <td>
                        <input type="number" name="qty[]" id="qty_1" data-row="1" class="input input-sm input-bordered max-w-24" />
                        <?php echo form_error('qty[]'); ?>
                    </td>
                    <td>
                        <input type="text" name="sub_total[]" id="subTotal_1" class="input input-sm input-bordered max-w-24" readonly />
                        <?php echo form_error('sub_total[]'); ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm delete-obat">delete</button>
                    </td>
                </tr>
        </tbody>
    </table>


            <tr>
                <td colspan="8">
                    <div class="flex gap-x-4">
                        <span class="w-full bg-yellow-400 h-4"></span>
                        <span class="w-full bg-yellow-200 h-4"></span>
                    </div>
                </td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2">
                    <label class="form-control w-full">
                        <div class="label">
                        <span class="label-text text-lg font-bold">Total Harga</span>
                        </div>
                        <input type="text" id="total_harga" name="total_harga" value="0" class="input input-sm input-bordered w-full text-right font-bold" readonly />
                    </label>
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-sm btn-success text-white mt-4">Save</button>
                </td>
            </tr>
        </form>


</div>

<script>
    $(document).ready(function () {
    
        $('#tambah-obat').on('click', function () {
            let newObatRow = $('#obat-table tr:last-child').clone();

            $('#obat-table').append(newObatRow);

            const lastRow = $('#obat-table tr:last-child').children().children()['0'];
            const lastRowId = parseInt($(lastRow).attr('id').split('_')[1]);
            const lastRowInput = $('#obat-table tr:last-child').find('input');
            
            lastRowInput.each(function() {
                const oldId = $(this).attr('id');

                const newId = oldId.replace(oldId.split('_')[1], parseInt(lastRowId) + 1);
                $(this).attr('id', newId);

                $(this).attr('data-row', parseInt(lastRowId) + 1);

            });

            newObatRow.find('input[type=text], input[type=number]').val('');
            newObatRow.find('select').prop('selectedIndex', 0);
        });

        $(document).on('click', '.delete-obat', function () {
            if ($('#obat-table').children().length !== 1) {
                $(this).closest('tr').remove();
            }
        });

        $(document).on('keyup', '.kategori', function () {
                $('#kategori_list').removeClass('hidden');

                const row = $(this).data('row');
                
                let query = $(this).val();

                if (query != '') {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url() ?>index.php/admin/obat/fetch_obat",
                        data: {search:query},
                        success: function(data) {
                            let response = JSON.parse(data);

                            $('#kategori_list').fadeIn();
                            $('#kategori_list').html(function () {
                                let htmlElement = '';

                                response.forEach(a => {
                                    htmlElement +=  "<button type='button'><div class='dropdown-item text-sm'>" + a.merk + "</div></button>";
                                });

                                return htmlElement;
                            });

                            $('#kode_' + row).val(response[0].id);
                            $('#harga_' + row).val(response[0].harga);
                        }
                    });

                } else {
                    $('#kategori_list').addClass('hidden');
                }
            });

            $(document).on('click', '.dropdown-kategori div', function() {
                $('.kategori').val($(this).text());
                $('#autocomplete').fadeOut();
                $('#kategori_list').addClass('hidden');
            });

            $(document).on('input', '[id^=qty_]', function() {
                const row = $(this).data('row');
                const qty = $(this).val();
                let price = $('#harga_' + row).val();

                price = parseFloat(price.replace('/[^0-9.-]+/g',""));
                
                const subTotal = qty * price;
                $('#subTotal_' + row).val(subTotal.toFixed(2));

                updateTotalPrice();
            });

            function updateTotalPrice() {
                var total = 0;
                $('[id^=subTotal_]').each(function() {
                    var subtotal = parseFloat($(this).val().replace(/[^0-9.-]+/g,""));
                    if (!isNaN(subtotal)) {
                        total += subtotal;
                    }
                });
                $('#total_harga').val(total.toFixed(2));
            }
    });
</script>
@endsection