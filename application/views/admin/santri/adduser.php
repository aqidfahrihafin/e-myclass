<?php $no = 1; foreach ($santri as $result) {?>
 <div class="modal fade adduser<?php echo $result->santri_id ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="custom-validation" action="<?php echo site_url('admin/santri/reg_user'); ?>" method="post">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert" align="justify">
                            <i class="mdi mdi-bullseye-arrow"></i>
                            <b>Perhatian !</b> username dan pasword default menggunakan NIK dan Tanggal Lahir.
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="santri_id" value="<?php echo $result->santri_id; ?>" name="santri_id" required="">
                            <input type="hidden" class="form-control" id="nik" value="<?php echo $result->nik; ?>" name="username" required="">
							<input type="hidden" class="form-control" name="password" value="<?php echo str_replace('-', '', $result->tanggal_lahir); ?>">
						</div>
						<table class="table" style="background-color: #ddd;">
							<tbody>
								<tr>
									<th style="width: 150px;">Username</th>
									<td><?php echo $result->nik; ?> </td>
								</tr>
								<tr>
									<th style="width: 150px;">Password</th>
									<td><?php echo str_replace('-', '', $result->tanggal_lahir); ?></td>
								</tr>
							</tbody>
						</table>
                  </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
<?php }?>
