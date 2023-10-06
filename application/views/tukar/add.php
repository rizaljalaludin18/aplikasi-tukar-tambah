<div class="container pt-5">
    <h3><?= $title ?></h3>
   <p></p>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('id' => 'FrmAddProduk', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>

                    <div class="form-group row">
                        <label for="Produk Baru" class="col-sm-2 col-form-label">Produk Baru</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="produk_baru" name="produk_baru">
                                <option value="Islam" selected disabled>Pilih Produk Baru</option>
                                <?php foreach ($data_produk as $row) : ?>
                                <option value="<?= $row->nama ?>" data-harga="<?= $row->harga ?>"><?= $row->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('Produk Baru') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Harga Baru" class="col-sm-2 col-form-label">Harga Baru</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga_baru" name="harga_baru" readonly value=" <?= set_value('harga_baru'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('Harga Baru') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Produk Lama" class="col-sm-2 col-form-label">Produk Lama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="produk_lama" name="produk_lama" value=" <?= set_value('produk_lama'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('Produk Lama') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Harga Lama" class="col-sm-2 col-form-label">Harga Lama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga_lama" name="harga_lama" value=" <?= set_value('harga_lama'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('Harga Lama') ?>
                            </small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="Total Bayar" class="col-sm-2 col-form-label">Total Bayar</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="total_bayar" name="total_bayar" value=" <?= set_value('total_bayar'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('Total Bayar') ?>
                            </small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#produk_baru').select2();

    $('#produk_baru').on('change', function()
    {
        harga_baru = $(this).find(':selected').data('harga');
        $('#harga_baru').val(harga_baru);
    });

    $('#harga_lama').on('keyup', function()
    {
        harga_baru = $('#harga_baru').val();
        harga_lama = $(this).val();
        total_bayar = parseInt(harga_baru) - parseInt(harga_lama);
        $('#total_bayar').val(total_bayar);
    });
</script>