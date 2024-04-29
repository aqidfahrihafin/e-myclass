<?php if ($this->session->flashdata('alert')): ?>
	<div id="alert">
		<?php echo $this->session->flashdata('alert'); ?>
	</div>
	<script>
		setTimeout(function() {
			document.getElementById("alert").remove();
		}, <?php echo $this->session->flashdata('alert_timeout'); ?>);
	</script>
<?php endif; ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <div class="clearfix">
                    <div class="float-right">
						<div class="btn-group" role="group" aria-label="Basic example">
							<a  target="_blank" href="<?php echo site_url('admin/users/cetak'); ?>"class="btn btn-danger btn-sm"><i class="bx bx-printer label-icon"></i></a>
						</div>
                    </div>
                    <h4 class="card-title mb-4"><?php echo $title ?></h4>
                    <hr>
                </div>

                <div class="table-responsive">

                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
								<th>Nama dosen</th>
								<th>Username</th>
								<th>Password</th>
								<th>Role</th>
								<th>Tanggal Dibuat</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>

						<?php $no = 1; foreach ($users_profiles as $result): ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $result->nama_users; ?></td>
								<td><?php echo $result->username; ?></td>
								<td><?php echo str_replace('-', '', $result->password); ?></td>
								<td><?php echo $result->role; ?></td>
								<td><?php echo $result->create_at; ?></td>
								 <td align="center">
									<button type="button" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="modal" data-target=".editusers<?php echo $result->user_id ?>">
										<i class="mdi mdi-pencil"></i>
									</button>
                                </td>
							</tr>
						<?php endforeach; ?>
                        </tbody>
                    </table>
					<script>
						function hapusdosen(dosenId) {
							if (confirm('Anda yakin ingin menghapus mapel ini?')) {
								window.location.href = '<?php echo base_url('admin/mapel/delete/'); ?>' + dosenId;
							}
						}
					</script>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<?php $this->load->view('admin/users/edit');?>


