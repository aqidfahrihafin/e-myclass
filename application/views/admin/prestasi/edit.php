<?php foreach ($mahasiswa as $mahasiswaItem) {?>
	<!-- add modal -->
    <div class="modal fade prestasi<?php echo $mahasiswaItem->mahasiswa_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title mt-0">Data prestasi <b><?php echo $mahasiswaItem->nama_mahasiswa; ?></b></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="table-responsive">
                       <table class="table mb-0">
        				 <thead class="thead-light">
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Janis Prestasi</th>
                                    <th>Nama Prestasi</th>
                                    <th>Tingkat</th>
                                    <th>Tahun</th>
                                    <th>Penyelenggara</th>
                                    <th>Tingkat</th>
                                    <th width="10px">Action</th>
                                </tr>
                            </thead>

                            <tbody>
								<?php $no = 1; $foundPrestasi = false; foreach ($prestasi as $result)  { ?>
										<?php if ($result->mahasiswa_id == $mahasiswaItem->mahasiswa_id): ?>
											<?php $foundPrestasi = true; ?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $result->jenis_prestasi; ?></td>
												<td align="center"><?php echo $result->nama_prestasi; ?></td>
												<td align="center"><?php echo $result->tingkat_prestasi;?></td>
												<td align="center"><?php echo $result->tahun_prestasi;?></td>
												<td align="center"><?php echo $result->penyelenggara;?></td>
												<td align="center"><?php echo $result->peringkat;?></td>
												<td align="center"> 
													<div class="input-group input-group-sm">
														<button type="button" class="btn btn-danger waves-effect waves-light btn-sm" onclick="hapusprestasi('<?php echo $result->prestasi_id; ?>')">
															<i class="mdi mdi-trash-can"></i>
														</button>
													</div>
												</td>
											</tr>
										<?php endif; ?>
								<?php  }  
									if (!$foundPrestasi) {
										echo "<tr align='center'><td colspan='8'>" . $mahasiswaItem->nama_mahasiswa . " belum memiliki data prestasi</td></tr>";
									}?>
                            </tbody>
                        </table>
						<script>
							function hapusprestasi(prestasiId) {
								if (confirm('Anda yakin ingin menghapus prestasi ini?')) {
									window.location.href = '<?php echo base_url('admin/prestasi/delete/'); ?>' + prestasiId;
								}
							}
						</script>
						<hr>
						<footer class="text-muted text-center">E-Reward LPPM by Apins Digital</footer>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php }?>
