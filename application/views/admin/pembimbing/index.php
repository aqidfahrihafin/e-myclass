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
                                <button type="button" class="btn btn-danger btn-sm waves-effect btn-label waves-light"
                                    data-toggle="modal" data-target=".addguru">
									<i class="bx bx-printer label-icon"></i> Cetak 
                                </button>
                            </div>
                        </div>
                        <h4 class="card-title mb-4"><?php echo $title ?></h4>
                        <hr>
                    </div>

				<div>
					<form id="tahunAjaranForm" action="<?php echo site_url('admin/pembimbing'); ?>" method="post">		
						<div class="form-group">
							<!-- <label class="control-label">Sanah Dirasah</label> -->
							<select class="form-control" name="tahun_ajaran_id" id="tahunAjaranSelect">
								<option value="">Pilih Sanah Dirasah</option> <!-- Opsi tambahan -->
								<?php usort($tahunajaran, function($a, $b) { return strcmp($b->tahun_ajaran_id, $a->tahun_ajaran_id);});
									foreach ($tahunajaran as $tahun) {?>
									<option value="<?php echo $tahun->tahun_ajaran_id; ?>"><?php echo $tahun->nama_tahun; ?></option>
								<?php }?>
							</select>
						</div>
					</form>
				</div>

				<script>
					document.getElementById('tahunAjaranSelect').addEventListener('change', function() {
						if (this.value !== "") {
							document.getElementById('tahunAjaranForm').submit();
						}
					});
				</script>


				    <hr>
                    <div class="table-responsive">

                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Kode Kelas</th>
                                    <th>Nama Kelas</th>
                                    <th>Target Kelas/Semester</th>
                                    <th>Sanah Dirasah</th>
                                    <th>Pembimbing</th>
                                </tr>
                            </thead>

                            <tbody>
								<?php $no = 1; foreach ($guru as $result) {?>							
									<tr>
										<td><?php echo $no++; ?></td>
										<td> 
											<?php echo $result->kode_kelas; ?>
										</td>
										<td><?php echo $result->kelas; ?>-<?php echo $result->jenis_kelas; ?></td>
										<td align="center">
											<span class="badge badge-pill badge-info font-size-8">
												<?php echo $result->target_kelas; ?>
											</span>
										</td>
										<td align="center">
											<span class="badge badge-pill badge-info font-size-8">
												<?php echo $result->nama_tahun; ?>
											</span>
										</td>
										<td><?php echo $result->nama_guru; ?></td>
										
									</tr>
								<?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
