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
								<a target="_blank" href="<?php echo site_url('admin/dosen/cetak'); ?>"class="btn btn-danger btn-sm"><i class="bx bx-printer label-icon"></i></a>
								<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".importdosen"><i class="mdi mdi-cloud-upload"></i></button>
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".adddosen"><i class="bx bx-plus"></i></button>
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
                                    <th>Nama</th>
                                    <th>NIDN</th>
                                    <th>L/P</th>
                                    <th>TTL</th>
                                    <th>Prodi</th>
                                    <th>Status</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php $no = 1; foreach ($dosen as $result) {?>							
									<tr>
										<td><?php echo $no++; ?></td>
										<td>
											<img src="<?php echo base_url('upload/photo/'.$result['photo']); ?>" alt="" class="avatar-xs rounded-circle me-2 mr-1">
											<a href="#" class="text-body"><?php echo $result['nama_dosen']; ?></a>
										</td>
										<td><?php echo $result['nidn']; ?></td>
										<td><?php echo $result['jenis_kelamin']; ?></td>
										<td><?php echo $result['tempat_lahir']; ?>, <?php $tanggal_lahir = $result['tanggal_lahir']; $tanggal_lahir_format = date('d-m-Y', strtotime($tanggal_lahir)); echo $tanggal_lahir_format;?></td>
										<td><?php echo !empty($result['nama_prodi']) ? $result['nama_prodi'] : '-'; ?></td>
										<td align="center">
											<span class="badge badge-pill badge-<?php echo ($result['status'] == 'aktif') ? 'success' : 'danger'; ?> font-size-8"><?php echo $result['status']; ?></span>
										</td>
										<td align="center">
											<div class="btn-group" role="group" aria-label="Basic example">
												<?php if ($result['status'] == 'aktif'): ?>
													<button type="button" class="btn btn-success btn-sm waves-effect waves-light" data-toggle="modal" data-target=".updateuser<?php echo $result['dosen_id'] ?>">
														<i class="mdi mdi-checkbox-marked-outline"></i>
													</button>
												<?php else: ?>
													<button type="button" class="btn btn-info btn-sm waves-effect waves-light" data-toggle="modal" data-target=".adduser<?php echo $result['dosen_id'] ?>">
														<i class="mdi mdi-account-plus"></i>
													</button>
												<?php endif; ?>
											    <button type="button" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="modal" data-target=".dosen<?php echo $result['dosen_id'] ?>">
													<i class="mdi mdi-pencil"></i>
												</button>
												<button type="button" class="btn btn-danger waves-effect waves-light btn-sm" onclick="hapusdosen('<?php echo $result['dosen_id']; ?>')">
													<i class="mdi mdi-trash-can"></i>
												</button>
											 </div>
											</td>
										</td>
									</tr>
								<?php }?>
                            </tbody>
                        </table>
						<script>
							function hapusdosen(dosenId) {
								if (confirm('Anda yakin ingin menghapus dosen ini?')) {
									window.location.href = '<?php echo base_url('admin/dosen/delete/'); ?>' + dosenId;
								}
							}
						</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
<?php $this->load->view('admin/dosen/add');?>
<?php $this->load->view('admin/dosen/edit');?>
<?php $this->load->view('admin/dosen/adduser');?>
<?php $this->load->view('admin/dosen/updateuser');?>
<?php $this->load->view('admin/dosen/importdosen');?>

