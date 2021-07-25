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
		<div class='row'>
			<div class='col-xs-12'>
				<div class='box'>
					<div class="box-header with-border">
						<h3 class="box-title">Data User</h3>
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
									<th><?php echo lang('index_fname_th'); ?></th>
									<th><?php echo lang('index_lname_th'); ?></th>
									<th><?php echo lang('index_email_th'); ?></th>
									<th><?php echo lang('index_groups_th'); ?></th>
									<th><?php echo lang('index_status_th'); ?></th>
									<th><?php echo lang('index_action_th'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($users as $user) : ?>
									<tr>
										<td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
										<td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
										<td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
										<td>
											<?php foreach ($user->groups as $group) : ?>
												<?php echo anchor("auth/edit_group/" . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?><br />
											<?php endforeach ?>
										</td>
										<td><?php echo ($user->active) ? anchor("auth/deactivate/" . $user->id, lang('index_active_link')) : anchor("auth/activate/" . $user->id, lang('index_inactive_link')); ?></td>
										<td><?php echo anchor("auth/edit_user/" . $user->id, 'Edit'); ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<p><?php echo anchor('auth/create_user', lang('index_create_user_link')) ?> | <?php echo anchor('auth/create_group', lang('index_create_group_link')) ?></p>
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