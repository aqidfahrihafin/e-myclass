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
	                <form action="#" method="post">
	                    <div class="row">
	                        <div class="col">
	                            <div class="position-relative">
	                                <input class="form-control chat-input" id="searchInput" required
	                                    placeholder="search materi..."></input>
	                            </div>
	                        </div>
	                </form>
	                <div class="col-auto">
	                    <a href="<?php echo base_url('/makul');?>" class="btn btn-primary btn-rounded">
	                        <i class="bx bx-undo"></i></a>
	                </div>
	            </div>
	        </div>
	    </div>

	    <div class="row">
	        <?php if ($materi) { $no = 1; usort($materi, function($a, $b) { return strcmp($b->materi_id, $a->materi_id);});
									foreach ($materi as $result) {?>
	        <div class="col-xl-12 col-sm-12 card-item">
	            <div class="card">
	                <!-- bg-soft-primary -->
	                <div class="card-body border-bottom">
	                    <?php if ($this->session->userdata('role') === 'admin' || $this->session->userdata('role') === 'dosen') { ?>
	                    <div class="row">
	                        <div class="col-md-4 col-9">
	                            <p class="font-size-8 mb-1"><b><?php echo $result->nama_kelas; ?></b> </p>
	                            <small class="text-muted mb-0"> <?php echo $result->nama_matakuliah; ?></small>
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
	                                                data-target=".editmateri<?php echo $result->materi_id ?>">Edit
	                                                Materi
	                                            </button>
	                                            <button class="dropdown-item" data-toggle="modal"
	                                                data-target=".hapusmateri<?php echo $result->materi_id ?>">Hapus
	                                                Materi
	                                            </button>
	                                        </div>
	                                    </div>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>
	                    <hr>
	                    <?php } ?>

	                    <div class="" style="cursor: pointer;"
	                        onclick="window.location='<?php echo base_url('detailmateri/'.$result->materi_id);?>'">
	                        <p class="font-size-8"><a href="#" class="text-dark"><b><?php echo $result->judul_materi; ?></b></a>
	                        </p>
	                        <small class="text-muted">
	                            <?php $isi_materi = $result->isi_materi; echo implode(" ", array_slice(explode(" ", strip_tags($isi_materi, '<b><i>')), 0, 5)); ?>....
	                        </small>
	                        <div align="right" class="mt-3">
	                            <a href="#" class="badge badge-warning font-size-11">0 Komentar Materi</a>
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
	                    <p><b>Belum ada data materi :(</b></p>
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

	<?php $this->load->view('admin/materi/editmateri');?>
	<?php $this->load->view('admin/materi/hapusmateri');?>

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
