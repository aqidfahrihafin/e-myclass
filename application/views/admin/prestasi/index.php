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
                                    data-toggle="modal" data-target=".prestasi"><i
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
                                    <th width="50px">NIS</th>
                                    <th width="50px">L/P</th>
                                    <th width="150px">Prestasi</th>
                                </tr>
                            </thead>

                            <tbody>
								<?php $no = 1; foreach ($santri as $result)  { ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $result->nama_santri; ?></td>
											<td align="center"><?php echo $result->no_induk;?></td>
											<td align="center"><?php echo $result->jenis_kelamin; ?></td>
											<td align="center"> 
												<div class="input-group input-group-sm">
													<div class="input-group-prepend">
														<span class="input-group-text mr-2 btn-info" style="padding: 2px 5px; border-radius: 3px;"><?php echo $result->jumlah_prestasi; ?></span>
													</div>
													<button type="button" class="btn btn-info btn-sm waves-effect"
														data-toggle="modal" data-target=".prestasi">
														<i class="mdi mdi-eye"></i> View detail
													</button>
												</div>
											</td>
										</tr>
								<?php  }  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!-- end row -->

<?php $this->load->view('admin/prestasi/add');?>
