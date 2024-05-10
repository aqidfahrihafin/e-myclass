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

	        <?php if ($this->session->userdata('role') === 'admin' || $this->session->userdata('role') === 'dosen') { ?>
	        <div class="card">
	            <div class="card-body">
	                <div class="clearfix">
	                    <div class="float-right">
	                        <div class="input-group input-group-sm">
	                            <button type="button"
	                                class="btn btn-primary btn-rounded btn-sm waves-effect btn-label waves-light"
	                                data-toggle="modal" data-target=".kelas"><i class="bx bx-plus label-icon"></i> Add
	                                Matakuliah
	                            </button>
	                        </div>
	                    </div>
	                    <h4 class="card-title"><?php echo $title ?></h4>
	                </div>
	            </div>
	        </div>
	        <?php } else { ?>
	        <div class="card">
	            <div class="card-body">
	                <form action="#" method="post">
	                    <div class="row">
	                        <div class="col">
	                            <div class="position-relative">
	                                <input class="form-control chat-input" id="searchInput" required
	                                    placeholder="search matakuliah..."></input>
	                            </div>
	                        </div>
	                </form>
	                <div class="col-auto">
	                    <a href="<?php echo base_url('/kelas');?>" class="btn btn-primary btn-rounded">
	                        <i class="bx bx-undo"></i></a>
	                </div>
	            </div>
	        </div>
	    </div>
	    <?php } ?>


	    <div class="row">
	        <?php if ($matakuliah) { $no = 1; usort($matakuliah, function($a, $b) { return strcmp($b->matakuliah_id, $a->matakuliah_id);});
									foreach ($matakuliah as $result) {?>
	        <div class="col-xl-4 col-sm-6 card-item">
	            <div class="card">
	                <!-- bg-soft-secondary -->
	                <div class="card-body border-bottom">
	                    <?php if ($this->session->userdata('role') === 'admin' || $this->session->userdata('role') === 'dosen') { ?>
	                    <div class="row">
	                        <div class="col-md-4 col-9">
	                            <p class="font-size-6 mb-1">E-MyClass</p>
	                            <small class="text-muted mb-0"><i
	                                    class="mdi mdi-circle text-success align-middle mr-1"></i> Active</small>
	                        </div>
	                        <div class="col-md-8 col-3">
	                            <ul class="list-inline user-chat-nav text-right mb-0">
	                                <li class="list-inline-item">
	                                    <div class="dropdown">
	                                        <button class="btn nav-btn dropdown-toggle" type="button"
	                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                            <i class="bx bx-dots-horizontal-rounded"></i>
	                                        </button>
	                                        <div class="dropdown-menu dropdown-menu-right" style="">
	                                            <button class="dropdown-item" data-toggle="modal"
	                                                data-target=".addmateri<?php echo $result->matakuliah_id ?>">Add
	                                                Materi/Pertemuan
	                                            </button>
	                                            <button class="dropdown-item" data-toggle="modal"
	                                                data-target=".matakuliah<?php echo $result->matakuliah_id ?>">Edit
	                                                Matakuliah
	                                            </button>
	                                            <button class="dropdown-item"
	                                                onclick="hapuskelas('<?php echo $result->matakuliah_id; ?>')">Hapus
	                                                Matakuliah
	                                            </button>
	                                        </div>
	                                    </div>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>
	                    <hr>
	                    <?php } ?>

	                    <div class="text-left" style="cursor: pointer;"
	                        onclick="window.location='<?php echo base_url('listmateri/'.$result->matakuliah_id); ?>'">
	                        <h6 class="font-size-8"><a href="#" class="text-dark"><?php echo $result->nama_kelas; ?> -
	                                <?php echo $result->nama_matakuliah; ?></a></h6>
	                        <small
	                            class="text-muted"><?php echo implode(" ", array_slice(explode(" ", $result->deskripsi), 0, 5)); ?>...</small>
	                        <h6 class="font-size-10 mb-2 mt-2"><?php echo $result->nama_dosen; ?></h6>
	                        <div>
	                            <a href="#" class="badge badge-warning font-size-11"><?php echo $result->jumlah_sks; ?>
	                                SKS</a>
	                            <a href="#" class="badge badge-primary font-size-11"><?php echo $result->jumlah_materi; ?>
	                                Materi/Pertemuan</a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <?php	} } else {?>
	        <div class="col-xl-12">
	            <div class="card">
	                <div class="card-body" align="center">
	                    <img src="<?php echo base_url('public/assets/images/null.png');?>" width="200px" alt="test"
	                        srcset="">
	                    <p><b>Belum ada data matakuliah :(</b></p>
	                </div>
	            </div>
	        </div>
	        <?php }?>

			<!-- jika pencarian gagal -->
			<div id="noResultsMessage" class="col-xl-12" style="display: none;">
				<div class="card">
					<div class="card-body" align="center">
						<img src="<?php echo base_url('public/assets/images/null.png');?>" width="200px" alt="test" srcset="">
						<p><b> data matakuliah tidak ditemukan :(</b></p>
					</div>
				</div>
			</div>
			<!-- jika pencarian gagal -->
	    </div>
	</div>
</div>

	<!-- end row -->

	<?php $this->load->view('admin/matakuliah/add');?>
	<?php $this->load->view('admin/matakuliah/addmateri');?>
	<?php $this->load->view('admin/matakuliah/edit');?>

<script>
	function hapuskelas(makulId) {
		if (confirm('Anda yakin ingin menghapus matakuliah ini?')) {
			window.location.href = '<?php echo base_url('admin/makul/delete/'); ?>' + makulId;
		}
	}
</script>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const searchInput = document.getElementById('searchInput');
		const noResultsMessage = document.getElementById('noResultsMessage');

		searchInput.addEventListener('input', function() {
			const searchTerm = searchInput.value.trim().toLowerCase();
			const cards = document.querySelectorAll('.card-item');

			let foundResults = false; // Variabel untuk menandai apakah hasil pencarian ditemukan

			cards.forEach(card => {
				const title = card.querySelector('.font-size-8 a').textContent.toLowerCase();
				const content = card.querySelector('.text-muted').textContent.toLowerCase();

				if (title.includes(searchTerm) || content.includes(searchTerm)) {
					card.style.display = ''; // Tampilkan card jika cocok dengan pencarian
					foundResults = true; // Setel status ditemukan menjadi true
				} else {
					card.style.display =
						'none'; // Sembunyikan card jika tidak cocok dengan pencarian
				}
			});

			// Tampilkan pesan jika tidak ada hasil pencarian yang ditemukan
			if (!foundResults) {
				noResultsMessage.style.display = 'block';
			} else {
				noResultsMessage.style.display = 'none';
			}
		});
	});
</script>
