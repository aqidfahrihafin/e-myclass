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

	        <div class="row">
	            <?php if ($materi) { $no = 1; usort($materi, function($a, $b) { return strcmp($b->materi_id, $a->materi_id);});
									foreach ($materi as $result) {?>
	            <div class="col-xl-12 col-sm-12">
	                <div class="card">
	                    <!-- bg-soft-primary -->
	                    <div class="card-body bg-soft-primary border-bottom">
	                        <div class="row">
	                            <div class="col-md-4 col-9">
	                                <p class="font-size-8 mb-1"><b><?php echo $result->nama_kelas; ?></b> </p>
	                                <small class="text-muted mb-0"> <?php echo $result->nama_matakuliah; ?></small>
	                            </div>
	                            <div class="col-md-8 col-3">
	                                <ul class="list-inline user-chat-nav text-right mb-0">
	                                    <li class="list-inline-item">
	                                        <div class="dropdown">
	                                            <a href="<?php echo base_url('listmateri/' . $result->matakuliah_id); ?>" class="btn btn-primary btn-rounded">
	                                                <i class="bx bx-undo"></i>
	                                            </a>
	                                        </div>
	                                    </li>
	                                </ul>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="card-body text-left" style="cursor: pointer;" onclick="window.location='#'">
	                        <p class="font-size-8"><a href="#" class="text-dark"><b><?php echo $result->judul_materi; ?></b></a>
	                        </p>
	                        <small class="text-muted"><?php echo $result->isi_materi; ?></small>
	                        <hr>
							<div align="center">
	                         <a href="<?php echo base_url('viewmateri/'.$result->materi_id);?>">download file materi</a>
							 </div>
	                        <hr>
	                    </div>

	                    <!-- diskusi -->
	                    <div class="card-body pb-0">
	                        <div>
	                            <div class="chat-conversation">
	                                <ul class="list-unstyled" data-simplebar="" style="max-height: 360px;">
	                                    <li>
	                                        <div class="chat-day-title">
	                                            <span class="title">Today</span>
	                                        </div>
	                                    </li>
	                                    <?php foreach ($diskusi as $diskusi) {?>
	                                    <li
	                                        class="<?php echo ($diskusi->user_id == $logged_in_user_id) ? 'right' : 'left'; ?>">
	                                        <div class="conversation-list">
	                                            <?php if ($diskusi->user_id == $logged_in_user_id) { ?>
	                                            <div class="dropdown">
	                                                <a class="dropdown-toggle" href="#" role="button"
	                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                                    <i class="bx bx-dots-vertical-rounded"></i>
	                                                </a>
	                                                <div class="dropdown-menu">
	                                                    <a class="dropdown-item" href="#">Delete</a>
	                                                </div>
	                                            </div>
	                                            <?php } ?>
	                                            <div class="ctext-wrap">
	                                                <div class="conversation-name">
	                                                    <small><b><?php echo $diskusi->nama_users; ?></b></small>
	                                                </div>
	                                                <small><?php echo $diskusi->isi_diskusi; ?></small><br>
	                                                <small class="mt-2"><i
	                                                        class="bx bx-time-five align-middle mr-1"></i><?php echo $diskusi->tanggal_posting; ?></small>
	                                            </div>
	                                        </div>
	                                    </li>
	                                    <?php }?>

	                                    <?php if (empty($diskusi)) { ?>
	                                    <div align="center">
	                                        <img src="<?php echo base_url('public/assets/images/null.png');?>"
	                                            width="150px" alt="test" srcset="">
	                                        <p><b>Belum ada data komentar :(</b></p>
	                                    </div>
	                                    <?php } ?>

	                                </ul>
	                            </div>

	                        </div>
	                    </div>

	                    <div class="p-3 chat-input-section">
	                        <form action="<?php echo base_url('admin/diskusimateri/simpan');?>" method="post">
	                            <div class="row">
	                                <div class="col">
	                                    <div class="position-relative">
	                                        <input type="hidden" name="materi_id"
	                                            value="<?php echo $result->materi_id; ?>">
	                                        <input type="hidden" name="user_id" value="<?php echo $user_data->user_id; ?>">
	                                        <textarea class="form-control rounded chat-input" name="isi_diskusi" required
	                                            placeholder="Tambahkan Komentar..."
	                                            style="height: auto; min-height: 38px; max-height: 38px;"></textarea>

	                                    </div>
	                                </div>
	                                <div class="col-auto">
	                                    <button type="submit"
	                                        class="btn btn-primary chat-send w-md waves-effect waves-light">
	                                        <span class="d-none d-sm-inline-block mr-2">Send</span>
	                                        <i class="mdi mdi-send"></i></button>
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                    <!-- adn diskusi -->

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
	        </div>

	    </div>
	</div>
	<!-- end row -->
