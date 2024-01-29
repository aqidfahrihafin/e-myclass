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
                                    data-toggle="modal" data-target=".kelas"><i
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
                                    <th>Kode Kelas</th>
                                    <th>Nama Kelas</th>
                                    <th>Guru Pembimbing</th>
                                    <th>Sanah Dirasah</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>

                            <tbody>
							<?php if ($kelas) { $no = 1; usort($kelas, function($a, $b) { return strcmp($b->kelas_id, $a->kelas_id);});
									foreach ($kelas as $result) {?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $result->kode_kelas; ?></td>
											<td><?php echo $result->kelas; ?></td>
											<td><?php echo $result->nama_guru; ?></td>
											<td align="center">
												<span class="badge badge-pill badge-info font-size-8"><?php echo $result->nama_tahun; ?></span>
											</td>
											<td align="center">
											<button type="button" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="modal" data-target=".kelas<?php echo $result->kelas_id ?>">
													<i class="mdi mdi-pencil"></i>
												</button>
												<button type="button" class="btn btn-danger waves-effect waves-light btn-sm" onclick="hapuskelas('<?php echo $result->kelas_id; ?>')">
													<i class="mdi mdi-trash-can"></i>
												</button>
											</td>
										</tr>
									<?php	} } else {?>
									<tr>
										<td colspan="6" align="center">Tidak ada data kelas.</td>
									</tr>
							<?php }?>
                          </tbody>
                        </table>
						<script>
							function hapuskelas(kelasId) {
								if (confirm('Anda yakin ingin menghapus kelas ini?')) {
									window.location.href = '<?php echo base_url('admin/kelas/delete/'); ?>' + kelasId;
								}
							}
						</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!-- end row -->

<?php $this->load->view('admin/kelas/add');?>
<?php $this->load->view('admin/kelas/edit');?>
