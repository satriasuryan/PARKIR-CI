<style media="screen">
   table,
   th,
   tr,
   td {
      text-align: center;
   }
</style>

<body class="hold-transition skin-blue layout-top-nav" onLoad="pindah()">
   <section class='content'>
<div class="row">
         <div class="col-md-6">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">GENERATE QRCODE</h3>
               </div>
               <div class="box-body">
                  <div class="form-group">
                     <label for="exampleInputEmail1">INPUT PLAT NOMOR DI SINI</label>
                     <input type="text" onChang="redy()" id="id" class="form-control" placeholder="Masukkan PLAT NOMOR yang terdaftar di Data Kendaraan">
                  </div>
               </div>
               <div class="box-footer">
                  <button onClick="redy()" onFocus="redy()" type="button" class="btn btn-primary btn-lg">Submit</button>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="box box-info">
               <div class="box-header with-border">
                  <h3 class="box-title">INFORMASI QRCODE AKAN MUNCUL DISINI</h3>
               </div>
               <div class="box-body ajax-content" id="showR">
               </div>
            </div>
         </div>
      </div>

      <div class='row'>
         <div class='col-xs-12'>
            <div class='box'>
               <div class="box-header with-border">
                  <h3 class="box-title">Data Kendaraan</h3>
                  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
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
                           <th width="30%">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $start = 0;
                        foreach ($karyawan_data as $karyawan) { ?>
                           <tr>
                              <td><?php echo ++$start ?></td>
                              <td><?php echo $karyawan->nama_civitas ?></td>
                              <td><?php echo $karyawan->status_civitas ?></td>
                              <td><?php echo $karyawan->nip_nim ?></td>
                              <td><?php echo $karyawan->plat_nomor ?></td>
                              <td><?php echo $karyawan->jenis_kendaraan ?></td>
                              <td><?php echo $karyawan->merk ?></td>
                              <td><?php if ($karyawan->status_kendaraan == "Terverifikasi") { ?>
                                 <h4><span class="label label-success"> Terverifikasi</span></h4>
                              <?php } else if ($karyawan->status_kendaraan == "Tidak Terverifikasi") { ?>
                                 <h4><span class="label label-danger"> Tidak Terverifikasi </span></h4>
                              <?php  } else { ?>
                                 <h4><span class="label label-default"> Belum Terverifikasi </span></h4>
                              <?php } ?>
                           </td>
                              <td style="text-align:center" width="140px">
                                 <?php
                                 echo anchor(site_url('karyawan/update/' . $karyawan->id), '<i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;&nbsp;Edit', array('title' => 'edit', 'class' => 'btn btn-warning'));
                                 echo '  ';
                                 echo anchor(site_url('karyawan/delete/' . $karyawan->id), '<i class="fa fa-trash-o fa-lg"></i>&nbsp;&nbsp;Hapus', 'title="delete" class="btn btn-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                 ?>
                              </td>
                           </tr>
                        <?php }   ?>
                     </tbody>
                  </table>
               </div><!-- /.box-body -->
            </div><!-- /.box -->
         </div><!-- /.col -->
      </div><!-- /.row -->
   </section><!-- /.content -->
   <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
   <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         $("#mytable").dataTable();
      });
   </script>
   <script type="text/javascript">
      function pindah() {
         $('#id').focus();
      };

      function redy() {
         var id = $('#id').val();
         $.ajax({
            type: 'POST',
            url: '<?php echo base_url('/GenBar/showw') ?>',
            data: `id=${id}`,
            beforeSend: function(msg) {
               $('#showR').html('<h1><i class="fa fa-spin fa-refresh" /></h1>');
            },
            success: function(msg) {
               $('#showR').html(msg);
               $('#plat_nomor').focus();
            }
         });
      }
   </script>
</body>