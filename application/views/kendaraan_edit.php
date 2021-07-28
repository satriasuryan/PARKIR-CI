<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">UBAH DATA KENDARAAN</h3>
                </div>
                <form role="form" id="myForm" data-toggle="validator" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama Civitas</label>
                            <input name="nama_civitas" type="text" class="form-control" placeholder="Nama Civitas" value="<?php echo $nama_civitas ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Status Civitas</label>
                            <select name="status_civitas" class="form-control" id="exampleSelectRounded0">
                                <option selected>Pilih Status Civitas</option>
                                <option value="Mahasiswa" <?php echo $status_civitas == 'Mahasiswa' ? 'selected' : ''; ?>>Mahasiswa</option>
                                <option value="Staff" <?php echo $status_civitas == 'Staff' ? 'selected' : ''; ?>>Staff</option>
                                <option value="Dosen" <?php echo $status_civitas == 'Dosen' ? 'selected' : ''; ?>>Dosen</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIP / NIM</label>
                            <input name="nip_nim" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIP / NIM" value="<?php echo $nip_nim ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Plat Nomor</label>
                            <input name="plat_nomor" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Plat Nomor" value="<?php echo $plat_nomor ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Jenis Kendaraan</label>
                            <select name="jenis_kendaraan" class="form-control" id="exampleSelectRounded0">
                                <option selected>Pilih Jenis Kendaraan</option>
                                <option value="Motor" <?php echo $jenis_kendaraan == 'Motor' ? 'selected' : ''; ?>>Motor</option>
                                <option value="Mobil" <?php echo $jenis_kendaraan == 'Mobil' ? 'selected' : ''; ?>>Mobil</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Merk</label>
                            <input name="merk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Merk" value="<?php echo $merk ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Upload STNK</label>
                            <div class="custom-file">
                                <input name="foto_stnk" type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Status Kendaraan</label>
                            <select name="status_kendaraan" class="form-control" id="exampleSelectRounded0">
                                <option selected>Pilih Status Kendaraan</option>
                                <option value="Tidak Terverifikasi" <?php echo $status_kendaraan == 'Tidak Terverifikasi' ? 'selected' : ''; ?>>Tidak Terverifikasi</option>
                                <option value="Terverifikasi" <?php echo $status_kendaraan == 'Terverifikasi' ? 'selected' : ''; ?>>Terverifikasi</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-lg btn3d"><?php echo $button ?></button>
                            <a href="<?php echo site_url('kendaraan') ?>" class="btn btn-default btn-lg">Cancel</a>
                        </div>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<script src="<?php echo base_url() ?>template/plugins/sweetalert/sweetalert.min.js"></script>
<script>
    <?= $this->session->flashdata('messageAlert'); ?>
</script>