<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-primary fade show" role="alert">
				<i class="mdi mdi-bullseye-arrow"></i>	Hi ! selamat datang di <b>E-Reward</b>  LPPM Universitas Annuqayah.
			</div>
		</div>
		<div class="col-xl-4">
			<div class="row">						
				<div class="col-xl-12">					
					<div class="card text-center">
						<div class="card-body ">
							<div class="">
								<img src="<?php echo base_url('upload/photo/'.$user_data->photo); ?>" alt="user" class="img-thumbnail rounded-circle" style="width: 100px; height: 100px;">
							</div>
							<h5 class="font-size-15 mt-4"><a href="#" class="text-dark"><?php echo $user_data->nama_dosen; ?></a></h5>
							<p class="text-muted"><span class="badge badge-pill badge-primary font-size-8"><?php echo $user_data->role; ?></span></p>
						</div>
						<div class="card-footer bg-transparent border-top">
							<div class="contact-links d-flex font-size-20">
								<div class="flex-fill">
									<a href="<?php echo base_url('card'); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Card Reward"><i class="bx bx-credit-card"></i></a>
								</div>
								<div class="flex-fill">
									<a href="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Profile"><i class="bx bx-edit"></i></a>
								</div>
								<div class="flex-fill">
									<a href="<?php echo base_url('profil'); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail Profile"><i class="bx bx-user-circle"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end card -->

			<div class="card">
				<div class="card-body">
					<div class="clearfix">
                        <div class="float-right">
							<a href="#" class="text-primary"><i class="bx bx-cog bx-spin"></i></a>
                        </div>
                        <h6 class="mb-4"><b>Info Pengajuan</b></h6>
                        <hr>
                    </div>
					<div class="">
						<ul class="verti-timeline list-unstyled">
							<li class="event-list active">
								<div class="event-timeline-dot">
									<i class="bx bx-right-arrow-circle bx-fade-right"></i>
								</div>
								<div class="media">
									<div class="mr-3">
										<i class="bx bx-server h4 text-primary"></i>
									</div>
									<div class="media-body">
										<div>
											<h6 class="font-size-8"><a href="#" class="text-dark">Seminar Prosiding</a></h6>
											<span class="text-primary">17 Januari 2024</span>
											<br>
											<span class="badge badge-pill badge-warning font-size-8">menunggu verifikasi ....</span>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>

				</div>
			</div>  
			<!-- end card -->
		</div>         
		
		<div class="col-xl-8">

			<div class="row">
				<div class="col-md-4">
					<div class="card mini-stats-wid">
						<div class="card-body">
							<div class="media">
								<div class="media-body">
									<p class="text-muted font-weight-medium">Selesai</p>
									<h4 class="mb-0">0</h4>
								</div>

								<div class="mini-stat-icon avatar-sm align-self-center rounded-circle bg-primary">
									<span class="avatar-title">
										<i class="bx bx-check-circle font-size-24"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mini-stats-wid">
						<div class="card-body">
							<div class="media">
								<div class="media-body">
									<p class="text-muted font-weight-medium">Pending</p>
									<h4 class="mb-0">1</h4>
								</div>

								<div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
									<span class="avatar-title">
										<i class="bx bx-hourglass font-size-24"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mini-stats-wid">
						<div class="card-body">
							<div class="media">
								<div class="media-body">
									<p class="text-muted font-weight-medium">Ditolak</p>
									<h4 class="mb-0">1</h4>
								</div>

								<div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
									<span class="avatar-title">
										<i class="bx bx-package font-size-24"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card mini-stats-wid">
						<div class="card-body">
							<div class="media">
								<div class="media-body">
									<p class="text-muted font-weight-medium">Dosen</p>
									<h4 class="mb-0"><?php echo $count_dosen; ?></h4>
								</div>

								<div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
									<span class="avatar-title">
										<i class="bx bx-user font-size-24"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card mini-stats-wid">
						<div class="card-body">
							<div class="media">
								<div class="media-body">
									<p class="text-muted font-weight-medium">Mahasiswa</p>
									<h4 class="mb-0"><?php echo $count_mahasiswa; ?></h4>
								</div>

								<div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
									<span class="avatar-title">
										<i class="bx bx-user font-size-24"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<div class="clearfix">
                        <div class="float-right">
							<div class="float-right">
								<a href="#" class="text-primary"><i class="bx bx-cog bx-spin"></i></a>
							</div>
                        </div>
                        <h6 class="mb-4"><b>Pengajuan</b></h6>
                        <hr>
                    </div>
					<div class="table-responsive">
						<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Projects</th>
									<th scope="col">Start Date</th>
									<th scope="col">Deadline</th>
									<th scope="col">Budget</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">1</th>
									<td>Apins Digital</td>
									<td>2 Sep, 2024</td>
									<td>20 Oct, 2025</td>
									<td>Rp. 2.000.000</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end row -->
