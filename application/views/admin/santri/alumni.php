	<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <div class="clearfix">
                        <div class="float-right">
                            <div class="input-group input-group-sm">
                                <a  target="_blank" href="<?php echo site_url('admin/santri/cetak_alumni'); ?>" class="btn btn-danger btn-sm waves-effect btn-label waves-light">
								<i class="bx bx-printer label-icon"></i> Cetak
                                </a>
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
                                    <th>Tgl Keluar</th>
                                    <th>Angkatan</th>
                                </tr>
                            </thead>

                            <tbody>
								<?php $no = 1; foreach ($santri as $result) {
									if ($result->status_santri === "keluar") { ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $result->nama_santri; ?></td>
											<td><?php echo $result->no_induk;?></td>
											<td><?php echo $result->jenis_kelamin; ?></td>
											<td><?php echo $result->tempat_lahir; ?>, <?php echo $result->tanggal_lahir; ?></td>
											<td><?php echo $result->tanggal_keluar; ?></td>
											<td><?php echo $result->nama_tahun; ?></td>
										</tr>
								<?php  } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
	<?php $this->load->view('admin/santri/add');?>
