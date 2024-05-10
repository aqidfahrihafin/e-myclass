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
	                <form action="<?php echo base_url('admin/mahasiswakelas/simpan'); ?>" method="post">
	                    <div class="row">
	                        <div class="col">
	                            <div class="position-relative">
	                                <input class="form-control chat-input" name="kode_kelas" required
	                                    placeholder="masukkan kode kelas..."></input>
	                            </div>
	                        </div>
	                        <div class="col-auto">
	                            <button type="submit" class="btn btn-primary btn-rounded">
	                                <i class="bx bx-search-alt search-icon"></i></button>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>

	        <?php if (empty($kelas_mahasiswa)): ?>
				<div class="row">
				<div class="col-xl-12">
	                <div class="card">
	                    <div class="card-body" align="center">
	                        <img src="<?php echo base_url('public/assets/images/null.png');?>" width="200px" alt="test"
	                            srcset="">
	                        <p><b>Belum ada data kelas :(</b></p>
	                    </div>
	                </div>
	            </div>
				</div>
	        <?php else: ?>
	        <div class="row">
	            <?php foreach ($kelas_mahasiswa as $result): ?>
	            <div class="col-xl-4 col-sm-6">
	                <div class="card">
	                    <div class="card-body border-bottom">
	                        <div class="row">
	                            <div class="col-md-4 col-9">
	                                <p class="font-size-6 mb-1">E-MyClass</p>
	                                <small class="text-muted mb-0"><i class="mdi mdi-circle text-success align-middle mr-1"></i> Active</small>
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
	                                                <button class="dropdown-item"
	                                                    onclick="hapusmahasiswakelas('<?php echo $result->mahasiswa_kelas_id; ?>')">Hapus
	                                                    kelas
	                                                </button>
	                                            </div>
	                                        </div>
	                                    </li>
	                                </ul>
	                            </div>
	                        </div>
	                        <br>
	                        <div class="text-left" style="cursor: pointer;"
	                            onclick="window.location='<?php echo base_url('makul'); ?>'">
	                            <h6 class="font-size-8"><a href="#" class="text-dark"><?php echo $result->nama_kelas; ?> -
	                                    <?php echo $result->nama_tahun; ?></a></h6>
	                            <div>
	                                <a href="#"
	                                    class="badge badge-warning font-size-11"><?php echo $result->nama_fakultas; ?></a>
	                                <a href="#"
	                                    class="badge badge-primary font-size-11"><?php echo $result->nama_prodi; ?></a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <?php endforeach; ?>
	        </div>
	        <?php endif; ?>
	    </div>
	</div>
	<!-- end row -->

<script>
	function hapusmahasiswakelas(makulId) {
		if (confirm('Anda yakin ingin menghapus matakuliah ini?')) {
			window.location.href = '<?php echo base_url('admin/mahasiswakelas/delete/'); ?>' + makulId;
		}
	}
</script>
