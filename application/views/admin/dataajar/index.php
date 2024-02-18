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
						<?php $isCetakButtonDisplayed = false; 
							foreach ($data_ajar as $result) { if ($result->kelas_id && !$isCetakButtonDisplayed) {	?>
								<div class="btn-group" role="group" aria-label="Basic example">
									<a class="btn btn-danger btn-sm waves-effect " target="_blank" href="<?php echo site_url('admin/datamengajar/cetak/' . $result->kelas_id); ?>">
										<i class="bx bx-printer label-icon"></i>
									</a>
								</div>
						<?php 	$isCetakButtonDisplayed = true; }}?>
							<button type="button" class="btn btn-primary btn-sm ml-1" data-toggle="modal" data-target=".dataajar"><i class="bx bx-plus"></i></button>
						</div>
					</div>
					<h4 class="card-title mb-4"><?php echo $title ?></h4>
					<hr>
				</div>

				<div>
					<form id="KelasForm" action="<?php echo site_url('datamengajar'); ?>" method="post">		
						<div class="form-group">
							<!-- <label class="control-label">Sanah Dirasah</label> -->
							<select class="form-control" name="data_ajar_id" id="kelasSelect">
								<option value="">Pilih Data Pelajaran</option> 
								<?php usort($kelas, function($a, $b) { return strcmp($b->kelas_id, $a->kelas_id);});
									foreach ($kelas as $result) {?>
									<option value="<?php echo $result->kelas_id; ?>"><?php echo $result->kelas; ?> <?php echo $result->jenis_kelas; ?> - <?php echo $result->nama_tahun; ?></option>
								<?php }?>
							</select>
						</div>
					</form>
				</div>

				<script>
					document.getElementById('kelasSelect').addEventListener('change', function() {
						if (this.value !== "") {
							document.getElementById('KelasForm').submit();
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
                                    <th>Mata Pelajaran</th>
                                    <th>Nama Kelas</th>
                                    <th>Guru</th>
                                    <th width="10px">Action</th>
                                </tr>
                            </thead>
                            <tbody>								
								<?php $no = 1; foreach ($data_ajar as $result) {?>							
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $result->kode_mapel; ?> - <?php echo $result->nama_mapel; ?> </td>								
										<td><?php echo $result->kelas; ?> <?php echo $result->jenis_kelas; ?></td>								
										<td><?php echo $result->nama_guru; ?></td>	
										<td align="center">
											<button type="button" class="btn btn-danger waves-effect waves-light btn-sm" onclick="hapusguru('<?php echo $result->data_ajar_id; ?>')">
												<i class="mdi mdi-trash-can"></i>
											</button>
										</td>							
									</tr>
								<?php }?>
                            </tbody>
                        </table>
						<script>
							function hapusguru(data_ajar_id) {
								if (confirm('Anda yakin ingin menghapus data ajar ini?')) {
									window.location.href = '<?php echo base_url('admin/datamengajar/delete/'); ?>' + data_ajar_id;
								}
							}
						</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
<?php $this->load->view('admin/dataajar/add');?>
