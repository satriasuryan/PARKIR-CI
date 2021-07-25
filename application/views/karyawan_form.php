<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">DAFTARKAN KENDARAAN</h3>
                </div>
                <form action="<?php echo $action; ?>" method="post" role="form" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama Civitas</label>
                            <input name="nama_civitas" type="text" class="form-control" placeholder="Nama Civitas">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Status Civitas</label>
                            <select name="status_civitas" class="form-control" id="exampleSelectRounded0">
                                <option selected>Pilih Status Civitas</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Staff">Staff</option>
                                <option value="Dosen">Dosen</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIP / NIM</label>
                            <input name="nip_nim" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIP / NIM">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Plat Nomor</label>
                            <input name="plat_nomor" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Plat Nomor">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Jenis Kendaraan</label>
                            <select name="jenis_kendaraan" class="form-control" id="exampleSelectRounded0">
                                <option selected>Pilih Jenis Kendaraan</option>
                                <option value="Motor">Motor</option>
                                <option value="Mobil">Mobil</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Merk</label>
                            <input name="merk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Merk">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Upload STNK</label>
                            <input name="foto_stnk" type="file" id="exampleInputFile">
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="<?php echo site_url('dashboard') ?>" class="btn btn-default btn-lg">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
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