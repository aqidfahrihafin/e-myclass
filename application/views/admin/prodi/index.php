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
							<!-- <a  target="_blank" href="<?php echo site_url('admin/prodi/cetak'); ?>"class="btn btn-danger btn-sm"><i class="bx bx-printer label-icon"></i></a> -->
							<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bs-example-modal-center"><i class="bx bx-plus"></i></button>
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
                                <th>Kode Prodi</th>
                                <th>Nama Prodi</th>
                                <th>Nama Fakultas</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php $no = 1; foreach ($prodi as $result) {?>		
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $result->kode_prodi; ?></td>
                                <td><?php echo $result->nama_prodi; ?></td>
                                <td><?php echo $result->nama_fakultas; ?></td>
                                <td align="center">
									<button type="button" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="modal" data-target=".prodi<?php echo $result->prodi_id ?>">
										<i class="mdi mdi-pencil"></i>
									</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-sm" onclick="hapusprodi('<?php echo $result->prodi_id; ?>')">
										<i class="mdi mdi-trash-can"></i>
									</button>
                                </td>
                            </tr>
						<?php }?>
                        </tbody>
                    </table>
					<script>
						function hapusprodi(prodiID) {
							if (confirm('Anda yakin ingin menghapus prodi ini?')) {
								window.location.href = '<?php echo base_url('admin/prodi/delete/'); ?>' + prodiID;
							}
						}
					</script>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<?php $this->load->view('admin/prodi/add');?>
<?php $this->load->view('admin/prodi/edit');?>

