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
                            <img src="<?php echo base_url('upload/photo/'.$user_data->photo); ?>" alt="user" class="img-thumbnail rounded-circle" style="width: 100px; height: 100px;">
                        </div>
                        <h5 class="font-size-15 text-truncate">
							</h5>
                        <div class="mt-2">
									<p class="text-muted mb-0 text-truncate"><span class="badge badge-pill badge-primary font-size-8"><?php echo $user_data->role; ?></span></p>
									<hr>
							 <?php if ($user_data->user_type == 'dosen'): ?>   			
									<div class="mt-2">
										<a href="" class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target=".updateprofil<?php echo $user_data->dosen_id; ?>">Edit Profile <i class="bx bx-edit ml-1"></i></a>
										<a href="<?php echo base_url('card');?>" class="btn btn-warning waves-effect waves-light btn-sm">Card <i class="bx bx-credit-card ml-1"></i></a>
									</div>
								<?php elseif ($user_data->user_type == 'mahasiswa'): ?>
									<div class="mt-2">
										<a href="" class="btn btn-warning waves-effect waves-light btn-sm" data-toggle="modal" data-target=".updateprofil<?php echo $user_data->mahasiswa_id; ?>">Edit <i class="bx bx-edit ml-1"></i></a>
										<a  target="_blank" href="<?php echo site_url('admin/mahasiswa/formulir/'.$user_data->mahasiswa_id); ?>" class="btn btn-primary bwaves-effect waves-light btn-sm">Formulir
											<i class="bx bx-printer label-icon ml-1"></i> 
										</a>
										<a href="<?php echo base_url('card');?>" class="btn btn-danger bwaves-effect waves-light btn-sm">Card <i class="bx bx-credit-card label-icon ml-1"></i> </a>								
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
                           
                            <?php if ($user_data->user_type == 'dosen'): ?>
                                 <tr>
                                <th scope="row">Nama Profil</th>
									<td><?php echo $user_data->nama_dosen; ?></td>
								</tr>
								<tr>
									<th scope="row">NIK</th>
									<td><?php echo $user_data->nik; ?></td>
								</tr>
								<tr>
									<th scope="row">NIDN</th>
									<td><?php echo $user_data->nidn; ?></td>
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
									<th scope="row">Telp/WA</th>
									<td><?php echo $user_data->telp_dosen; ?></td>
								</tr>
								<tr>
									<th scope="row">Alamat</th>
									<td><?php echo $user_data->alamat_dosen; ?></td>
								</tr>
								<tr>
									<th scope="row">Prodi</th>
									<td><?php echo !empty($user_data->nama_prodi) ? $user_data->nama_prodi : '-'; ?></td>
								</tr>
								<tr>
									<th scope="row">Fakultas</th>
									<td><?php echo !empty($user_data->nama_fakultas) ? $user_data->nama_fakultas : '-'; ?></td>
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
                            <?php elseif ($user_data->user_type == 'mahasiswa'): ?>
                                <tr>
									<th scope="row">Nama Profil</th>
									<td><?php echo $user_data->nama_mahasiswa; ?></td>
								</tr>
								<tr>
									<th scope="row">NIM</th>
									<td><?php echo $user_data->nim; ?></td>
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
								<tr>
									<th scope="row">Alamat</th>
									<td><?php echo $user_data->alamat_mahasiswa; ?></td>
								</tr>
								<tr>
									<th scope="row">Telp/WA</th>
									<td><?php echo $user_data->telp_mahasiswa; ?></td>
								</tr>
								<tr>
									<th scope="row">Email</th>
									<td><?php echo $user_data->email; ?></td>
								</tr>
								<tr>
									<th scope="row">Prodi</th>
									<td><?php echo !empty($user_data->nama_prodi) ? $user_data->nama_prodi : '-'; ?></td>
								</tr>
								<tr>
									<th scope="row">Fakultas</th>
									<td><?php echo !empty($user_data->nama_fakultas) ? $user_data->nama_fakultas : '-'; ?></td>
								</tr>
								<tr>
									<th scope="row">Angkatan</th>
									<td>
										<?php echo ($user_data->tahun_ajaran_id === null || $user_data->tahun_ajaran_id === '') ? '<span class="badge badge-pill aves-effect waves-light badge-warning">Belum Registrasi</span>' : $user_data->nama_tahun; ?>
									</td>
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

                            <?php endif; ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/users/updateprofil');?>
<?php $this->load->view('admin/users/updateprofilmhs');?>
