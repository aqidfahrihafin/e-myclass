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
							<!-- <a  target="_blank" href="<?php echo site_url('admin/perpub/cetak'); ?>"class="btn btn-danger btn-sm"><i class="bx bx-printer label-icon"></i></a> -->
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
                                <th>Kategori Pengajuan</th>
                                <th>Nama Peringkat</th>
                                <th>Slug URL</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php $no = 1; foreach ($perpub as $result) {?>		
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>
									<?php if ($result->nama_kategori == 'Reward') : ?>
										<span class="badge badge-pill badge-primary font-size-8"><?php echo $result->nama_kategori; ?> </span> <small>Publikasi Ilmiah</small>
									<?php elseif ($result->nama_kategori == 'Bantuan') : ?>
										<span class="badge badge-pill badge-warning font-size-8"><?php echo $result->nama_kategori; ?> </span> <small>Publikasi Ilmiah</small>
									<?php else : ?>
										<span class="badge badge-pill badge-secondary font-size-8"><?php echo $result->nama_kategori; ?> </span> <small>Publikasi Ilmiah</small>
									<?php endif; ?>
								</td>
                                <td><?php echo $result->nama_peringkat; ?></td>
                                <td><?php echo $result->slug_url; ?></td>
                                <td align="center">
									<button type="button" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="modal" data-target=".perpub<?php echo $result->peringkat_publikasi_id ?>">
										<i class="mdi mdi-pencil"></i>
									</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-sm" data-toggle="modal" data-target=".deleteperpub<?php echo $result->peringkat_publikasi_id ?>">
										<i class="mdi mdi-trash-can"></i>
									</button>
                                </td>
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
<?php $this->load->view('admin/perpub/add');?>
<?php $this->load->view('admin/perpub/edit');?>
<?php $this->load->view('admin/perpub/delete');?>

