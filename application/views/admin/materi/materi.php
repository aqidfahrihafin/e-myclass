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
	                                data-toggle="modal" data-target=".kelas"><i class="bx bx-plus label-icon"></i> Add
	                            </button>
	                        </div>
	                    </div>
	                    <h4 class="card-title"><?php echo $title ?></h4>
	                </div>
	            </div>
	        </div>
	
			
			<div class="row">
	            <?php if ($materi) { $no = 1; usort($materi, function($a, $b) { return strcmp($b->matakuliah_id, $a->matakuliah_id);});
									foreach ($materi as $result) {?>
	            <div class="col-xl-12 col-sm-12">
	                <div class="card">
	                    <div class="card-body border-bottom">
	                        <div class="row">
	                            <div class="col-md-4 col-9">
	                                <p class="font-size-8 mb-1"><?php echo $result->judul_materi; ?></p>
	                                <p class="text-muted mb-0"><i
	                                        class="mdi mdi-circle text-success align-middle mr-1"></i> Active</p>
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
	                                                    data-target=".addmateri<?php echo $result->matakuliah_id ?>">Tambah
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
	                    </div>
	                    <div class="card-body text-left" style="cursor: pointer;"
	                        onclick="window.location='<?php echo base_url('detailmateri/'.$result->matakuliah_id); ?>'">
	                        <h6 class="font-size-8"><a href="#" class="text-dark"><?php echo $result->judul_materi; ?></a>
	                        </h6>
	                        <small class="text-muted"><?php echo $result->isi_materi; ?></small>
	                        <p class="text-muted"><?php echo $result->dokumen; ?></p>
	                        <div>
	                            <a href="#" class="badge badge-warning font-size-11 m-1">0
	                                Komentar Materi</a>
	                            <a href="#"
	                                class="badge badge-primary font-size-11 m-1">0
	                                Materi/Pertemuan</a>
	                        </div>
	                    </div>
	                </div>
	            </div>

	            <?php	} } else {?>
	            <div class="col-xl-12">
	                <div class="card bg-warning text-white-50">
	                    <div class="card-body">
	                        <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-alert-outline alert-soft mr-3"></i>Perhatian
	                            !
	                        </h5>
	                        <p class="card-text">Anda belum memiliki matakuliah yang <b> aktif</b>, silahkan create
	                            matakuliah.</p>
	                    </div>
	                </div>
	            </div>
	            <?php }?>
	        </div>
			
	    </div>
	</div>
	<!-- end row -->
