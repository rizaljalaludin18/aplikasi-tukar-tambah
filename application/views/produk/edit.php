<div class="container pt-5">
    <h3><?= $title ?></h3>
    <p></p>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('id' => 'FrmEditProduk', 'method' => "post", "autocomplete" => "off");
                    echo form_open_multipart('', $attributes);
                    ?>
                    <div class="form-group row">
                        <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id" name="id" value=" <?= $data_produk->id; ?>">
                            <input type="text" class="form-control" id="Nama" name="Nama" value=" <?= $data_produk->nama; ?>">
                            <small class="text-danger">
                                <?php echo form_error('Nama') ?>
                            </small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="Harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Harga" name="Harga" value=" <?= $data_produk->harga; ?>">
                            <small class="text-danger">
                                <?php echo form_error('Harga') ?>
                            </small>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="Gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <img src="<?php echo base_url()?>assets/foto_produk/<?php echo $data_produk->gambar ?>" width="100px">
                            <p></p>
                            <input type="file" class="form-control-file" name="gambar" accept="image/*">
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