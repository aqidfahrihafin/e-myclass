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
								<a target="_blank" href="<?php echo site_url('admin/santri/cetak'); ?> "class="btn btn-danger btn-sm"><i class="bx bx-printer label-icon"></i></a>
								<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".importsantri"><i class="mdi mdi-cloud-upload"></i></button>
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".addsantri"><i class="bx bx-plus"></i></button>
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
                                    <th>NIS</th>
                                    <th>Jenis Kelamin</th>
                                    <th>TTL</th>
                                    <th>Tgl Registrasi</th>
                                    <th>Angkatan</th>
                                    <th>Status Akun</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>

                            <tbody>
								<?php $no = 1; foreach ($santri as $result) {
									if ($result->status_santri !== "keluar") { ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $result->nama_santri; ?></td>
											<td><?php echo $result->no_induk;?></td>
											<td><?php echo $result->jenis_kelamin; ?></td>
											<td><?php echo $result->tempat_lahir; ?>, <?php echo $result->tanggal_lahir; ?></td>
											<td>
												<?php echo ($result->tahun_ajaran_id === null || $result->tahun_ajaran_id === '') ? '<span class="badge badge-pill aves-effect waves-light badge-warning">Belum Registrasi</span>' : $result->tanggal_masuk; ?>
											</td>
											<td><?php echo ($result->tahun_ajaran_id === null || $result->tahun_ajaran_id === '') ? '<span class="badge badge-pill aves-effect waves-light badge-warning">Belum Registrasi</span>' : $result->nama_tahun; ?></td>

											<td align="center">
												<span class="badge badge-pill badge-<?php echo ($result->status_santri == 'aktif') ? 'success' : 'danger'; ?> font-size-8"><?php echo $result->status_santri; ?></span>
											</td>
											<td align="center">
												<?php if ($result->status_santri == 'aktif'): ?>
													<button type="button" class="btn btn-success btn-sm waves-effect waves-light" data-toggle="modal" data-target=".updatesantri<?php echo $result->santri_id ?>">
														<i class="mdi mdi-checkbox-marked-outline"></i>
													</button>
												<?php else: ?>
													<button type="button" class="btn btn-info btn-sm waves-effect waves-light" data-toggle="modal" data-target=".addsantri<?php echo $result->santri_id ?>">
														<i class="mdi mdi-account-plus"></i>
													</button>
												<?php endif; ?>
												<button type="button" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="modal" data-target=".editsantri<?php echo $result->santri_id ?>">
													<i class="mdi mdi-pencil"></i>
												</button>
												<button type="button" class="btn btn-danger waves-effect waves-light btn-sm" onclick="hapussantri('<?php echo $result->santri_id; ?>')">
													<i class="mdi mdi-trash-can"></i>
												</button>
											</td>
										</tr>
								<?php  } } ?>
                            </tbody>
                        </table>
						<script>
							function hapussantri(santriId) {
								if (confirm('Anda yakin ingin menghapus santri ini?')) {
									window.location.href = '<?php echo base_url('admin/santri/delete/'); ?>' + santriId;
								}
							}
						</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
	<?php $this->load->view('admin/santri/add');?>
	<?php $this->load->view('admin/santri/edit');?>
	<?php $this->load->view('admin/santri/importsantri');?>
