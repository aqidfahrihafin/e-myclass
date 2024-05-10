<?php $no = 1; foreach ($mahasiswa as $result) {?>
 <div class="modal fade updateuser<?php echo $result->mahasiswa_id ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Non Aktifkan Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="custom-validation" action="<?php echo site_url('admin/mahasiswa/update_status'); ?>" method="post">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" align="justify">
                            <i class="mdi mdi-bullseye-arrow"></i>
                            Yakin ingin me non-aktifkan user ini ?
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="mahasiswa_id" value="<?php echo $result->mahasiswa_id; ?>" name="mahasiswa_id" required="">
						</div>
						<table class="table" style="background-color: #ddd;">
							<tbody>
								<tr>
									<th style="width: 150px;">Username</th>
									<td><?php echo $result->nim; ?> </td>
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
