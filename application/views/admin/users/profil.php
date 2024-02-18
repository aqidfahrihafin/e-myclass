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
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-soft-primary">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary"></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row" align="center">
                    <div class="col-sm-12">
                        <div style="margin-top: 4px; margin-bottom: 4px;">
                            <img src="<?php echo base_url('upload/photo/'.$user_data->photo); ?>" alt="TTD" class="img-thumbnail rounded-circle" style="width: 100px; height: 100px;">
                        </div>
                        <h5 class="font-size-15 text-truncate"><?php echo $user_data->nama_users; ?></h5>
                        <div class="mt-2">
							 <?php if ($user_data->user_type == 'guru'): ?>   			
									<p class="text-muted mb-0 text-truncate"><?php echo $user_data->role; ?></p>
									<div class="mt-2">
										<a href="" class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target=".updateprofil<?php echo $user_data->guru_id; ?>">Edit Profile <i class="mdi mdi-arrow-right ml-1"></i></a>
									</div>
								<?php elseif ($user_data->user_type == 'santri'): ?>
									<p class="text-muted mb-0 text-truncate"><?php echo $user_data->role; ?> santri</p>
									<div class="mt-2">
										<a  target="_blank" href="<?php echo site_url('admin/santri/formulir/'.$user_data->santri_id); ?>" class="btn btn-primary btn-sm waves-effect btn-label waves-light">
											<i class="bx bx-printer label-icon"></i> Cetak Formulir
										</a>
									</div>
							 <?php endif; ?>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>

    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Data Profil</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <tbody>
                           
                            <?php if ($user_data->user_type == 'guru'): ?>
                                 <tr>
                                <th scope="row">Nama Profil</th>
									<td><?php echo $user_data->nama_guru; ?></td>
								</tr>
								<tr>
									<th scope="row">NIK</th>
									<td><?php echo $user_data->nik; ?></td>
								</tr>
								<tr>
									<th scope="row">NIY</th>
									<td><?php echo $user_data->niy; ?></td>
								</tr>
								<tr>
									<th scope="row">TTL</th>
									<td><?php echo $user_data->tempat_lahir; ?>, <?php echo $user_data->tanggal_lahir; ?></td>
								</tr>
								<tr>
									<th scope="row">Jenis Kelamin</th>
									<td><?php echo $user_data->jenis_kelamin; ?></td>
								</tr>
								<tr>
									<th scope="row">Pendidikan</th>
									<td><?php echo $user_data->pendidikan; ?></td>
								</tr>
								<tr>
									<th scope="row">Telp/WA</th>
									<td><?php echo $user_data->telp_guru; ?></td>
								</tr>
								<tr>
									<th scope="row">Alamat</th>
									<td><?php echo $user_data->alamat_guru; ?></td>
								</tr>
								<tr>
									<th scope="row">QR Code</th>
									<td>
										<?php if (!empty($user_data->qrcode)): ?>
											<img src="<?php echo base_url('upload/qrcode/'.$user_data->qrcode); ?>" alt="" width="55px">
										<?php else: ?>
											<small style="color: red;">Silakan update profil untuk mendapatkan QR Code</small>
										<?php endif; ?>
									</td>
								</tr>

							<!-- data wali -->
                            <?php elseif ($user_data->user_type == 'santri'): ?>
                                <tr>
									<th scope="row">Nama Profil</th>
									<td><?php echo $user_data->nama_santri; ?></td>
								</tr>
								<tr>
									<th scope="row">NIK</th>
									<td><?php echo $user_data->nik; ?></td>
								</tr>
								<tr>
									<th scope="row">TTL</th>
									<td><?php echo $user_data->tempat_lahir; ?>, <?php echo $user_data->tanggal_lahir; ?></td>
								</tr>
								<tr>
									<th scope="row">Jenis Kelamin</th>
									<td><?php echo $user_data->jenis_kelamin; ?></td>
								</tr>
                            <?php endif; ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/users/updateprofil');?>
