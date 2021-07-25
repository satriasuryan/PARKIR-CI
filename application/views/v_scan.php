<link rel="stylesheet" href="<?php echo base_url()?>assets/css/printcss.css" type="text/css" media="print"/>
  <div class="box box-widget">
            <?php
			$params['data'] = $plat_nomor;
			$params['level'] = 'H';
			$params['size'] = 4;
			$params['savename'] = FCPATH."uploads/qr_image/".$plat_nomor.'code.png';
            $this->ciqrcode->generate($params);
		 ?>

      <div id="print-area">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                <img class="img-responsive" src="<?php echo base_url('uploads/qr_image/').$plat_nomor.'code.png';?>" />
              </div>
              <!-- /.widget-user-image -->
              <h4 class="widget-user-desc"><?php echo $nama_civitas?></h4>
              <h6 class="widget-user-desc">NIP/NIM :  <?php echo $nip_nim;?></h6>
              <h6 class="widget-user-desc">PLAT_NOMOR :  <?php echo $plat_nomor;?></h6>
              <h6 class="widget-user-desc">MERK :  <?php echo $merk;?></h6>
              <button onclick="printDiv('print-area')" class='pull-right'><i class='fa fa-print'></i> Print</button>
            </div>
          </div>
        </div>
      </div>

      <script src="<?php echo base_url() ?>template/plugins/jQuery/jQuery-2.1.4.min.js"></script>
      <script type="text/javascript">
        function printDiv(divName) {
           var printContents = document.getElementById(divName).innerHTML;
           var originalContents = document.body.innerHTML;
           document.body.innerHTML = printContents;
           window.print();
           document.body.innerHTML = originalContents;
      }
      </script>
