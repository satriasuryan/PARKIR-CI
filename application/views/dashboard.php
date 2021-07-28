
            <section class='content'>
                <div class='row'>
                    <div class='col-xs-12'>
                        <div class='box'>
                            <div class="box-header">
                                <h3 class="box-title">STATUS KENDARAAN</h3>
                            </div><!-- /.box-header -->


                            <div class='box-body'>
                                <table class="table table-bordered table-striped" id="mytable">
                                    <thead>
                                        <tr>
                                            <th width="20px">No</th>
                                            <th>Nama Civitas</th>
                                            <th>Status Civitas</th>
                                            <th>NIP/NIM</th>
                                            <th>Plat Nomor</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Merk</th>
                                            <th>Status Kendaraan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $start = 0;
                                        foreach ($kendaraan_data as $kendaraan) { ?>
                                            <tr>
                                                <td><?php echo ++$start ?></td>
                                                <td><?php echo $kendaraan->nama_civitas ?></td>
                                                <td><?php echo $kendaraan->status_civitas ?></td>
                                                <td><?php echo $kendaraan->nip_nim ?></td>
                                                <td><?php echo $kendaraan->plat_nomor ?></td>
                                                <td><?php echo $kendaraan->jenis_kendaraan ?></td>
                                                <td><?php echo $kendaraan->merk ?></td>
                                                <td><?php if ($kendaraan->status_kendaraan == "Terverifikasi") { ?>
                                 <h4><span class="label label-success"> Terverifikasi</span></h4>
                              <?php } else if ($kendaraan->status_kendaraan == "Tidak Terverifikasi") { ?>
                                 <h4><span class="label label-danger"> Tidak Terverifikasi </span></h4>
                              <?php  } else { ?>
                                 <h4><span class="label label-default"> Belum Terverifikasi </span></h4>
                              <?php } ?>
                           </td>
                                            </tr>
                                        <?php }   ?>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </section>
            <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
   <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         $("#mytable").dataTable();
      });
   </script>