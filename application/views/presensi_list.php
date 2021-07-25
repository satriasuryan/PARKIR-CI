<style media="screen">
   table,
   th,
   tr,
   td {
      text-align: center;
   }
</style>

<!-- Main content -->
<section class='content'>

<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$jumlah ?> / 250</h3>
              <p>Jumlah Kendaraan Terparkir</p>
            </div>
            <div class="icon">
              <i class="fa fa-motorcycle"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
      </div>

   <div class='row'>
      <div class='col-md-12'>
         <div class='box'>
            <div class='box-header with-border'>
               <h3 class="box-title">Daftar Kendaraan Terparkir</h3>
               <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div><!-- /.box-header -->
            <div class='box-body'>
               <table class="table table-bordered table-striped" id="mytable">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Nama Civitas</th>
                        <th>NIP/NIM</th>
                        <th>Plat Nomor</th>
                        <th>Merk</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th width="25px">status </th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $start = 0;
                     foreach ($terparkir_data as $terparkir) {  ?>
                        <tr>
                           <td><?php echo ++$start ?></td>
                           <td><?php echo $terparkir->nama_civitas ?></td>
                           <td><?php echo $terparkir->nip_nim ?></td>
                           <td><?php echo $terparkir->plat_nomor ?></td>
                           <td><?php echo $terparkir->merk ?></td>
                           <td><?php echo $terparkir->jam_msk ?></td>
                           <td><?php echo $terparkir->jam_klr ?></td>
                           <td><?php if ($terparkir->id_status == 1) { ?>
                                 <h4><span class="label label-success"> <?php echo $terparkir->nama_status ?></span></h4>
                              <?php } else if ($terparkir->id_status == 2) { ?>
                                 <h4><span class="label label-danger"> <?php echo $terparkir->nama_status ?> </span></h4>
                              <?php  } else { ?>
                                 <h4><span class="label label-default"> <?php echo $terparkir->nama_status ?> </span></h4>
                              <?php } ?>
                           </td>
                        </tr>
                     <?php  }  ?>
                  </tbody>
               </table>
               <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
               <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
               <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
               <script type="text/javascript">
                  $(document).ready(function() {
                     $("#mytable").dataTable();
                  });
               </script>
            </div><!-- /.box-body -->
         </div><!-- /.box -->
         <div class="box">
            <div class='box-header with-border'>
               <h3 class="box-title">Histori Parkir</h3>
               <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div><!-- /.box-header -->
            <div class='box-body'>
               <table class="table table-bordered table-striped" id="mytable1">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Nama Civitas</th>
                        <th>NIP/NIM</th>
                        <th>Plat Nomor</th>
                        <th>Merk</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th width="25px">status </th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $start = 0;
                     foreach ($presensi_data as $presensi) {  ?>
                        <tr>
                           <td><?php echo ++$start ?></td>
                           <td><?php echo $presensi->nama_civitas ?></td>
                           <td><?php echo $presensi->nip_nim ?></td>
                           <td><?php echo $presensi->plat_nomor ?></td>
                           <td><?php echo $presensi->merk ?></td>
                           <td><?php echo $presensi->jam_msk ?></td>
                           <td><?php echo $presensi->jam_klr ?></td>
                           <td><?php if ($presensi->id_status == 1) { ?>
                                 <h4><span class="label label-success"> <?php echo $presensi->nama_status ?></span></h4>
                              <?php } else if ($presensi->id_status == 2) { ?>
                                 <h4><span class="label label-danger"> <?php echo $presensi->nama_status ?> </span></h4>
                              <?php  } else { ?>
                                 <h4><span class="label label-default"> <?php echo $presensi->nama_status ?> </span></h4>
                              <?php } ?>
                           </td>
                        </tr>
                     <?php  }  ?>
                  </tbody>
               </table>
               <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
               <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
               <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
               <script type="text/javascript">
                  $(document).ready(function() {
                     $("#mytable1").dataTable();
                  });
               </script>
            </div><!-- /.box-body -->

         </div>


      </div><!-- /.col -->
   </div><!-- /.row -->
</section><!-- /.content -->