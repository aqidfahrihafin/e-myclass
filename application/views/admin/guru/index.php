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
                            <div class="input-group input-group-sm">
                                <button type="button" class="btn btn-primary btn-sm waves-effect btn-label waves-light"
                                    data-toggle="modal" data-target=".addguru"><i
                                        class="bx bx-plus label-icon"></i> Add
                                </button>
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
                                    <th>NIY</th>
                                    <th>L/P</th>
                                    <th>TTL</th>
                                    <th>Pendidikan</th>
                                    <th>Status</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>

                            <tbody>
								<?php $no = 1; foreach ($guru as $result) {?>							
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $result['nama_guru']; ?></td>
										<td><?php echo $result['niy']; ?></td>
										<td><?php echo $result['jenis_kelamin']; ?></td>
										<td><?php echo $result['tempat_lahir']; ?>, <?php $tanggal_lahir = $result['tanggal_lahir']; $tanggal_lahir_format = date('d-m-Y', strtotime($tanggal_lahir)); echo $tanggal_lahir_format;?></td>
										<td><?php echo $result['pendidikan']; ?></td>
										<td align="center">
											<span class="badge badge-pill badge-<?php echo ($result['status'] == 'aktif') ? 'success' : 'danger'; ?> font-size-8"><?php echo $result['status']; ?></span>
										</td>
										<td align="center">
											<button type="button" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="modal" data-target=".kelas<?php echo $result['guru_id'] ?>">
													<i class="mdi mdi-pencil"></i>
												</button>
												<button type="button" class="btn btn-danger waves-effect waves-light btn-sm" onclick="hapusguru('<?php echo $result['guru_id']; ?>')">
													<i class="mdi mdi-trash-can"></i>
												</button>
											</td>
										</td>
									</tr>
								<?php }?>
                            </tbody>
                        </table>
						<script>
							function hapusguru(guruId) {
								if (confirm('Anda yakin ingin menghapus guru ini?')) {
									window.location.href = '<?php echo base_url('admin/guru/delete/'); ?>' + guruId;
								}
							}
						</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
<?php $this->load->view('admin/guru/add');?>
<?php $this->load->view('admin/guru/edit');?>

