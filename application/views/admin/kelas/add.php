 <!-- modal add  -->
 <div class="modal fade kelas" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add <?php echo $title ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('admin/kelas/simpan'); ?>" method="post">				
                        <div class="form-group">
                            <label for="tahun">Tingkat Kelas</label>
                            <input type="text" class="form-control" name="kelas" id="tahun">
                        </div>
						<div class="form-group">
                            <label for="target">Target Kelas/Semester</label>
                            <input type="text" class="form-control" name="target_kelas" id="target">
                        </div>
						<div class="form-group">
							<label class="control-label">Nama Kelas</label>
							<select class="form-control" name="jenis_kelas">
								<option value="Putra">Putra</option>
								<option value="Putri">Putri</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Sanah Dirasah</label>
							<select class="form-control" name="tahun_ajaran_id">
								<?php usort($tahunajaran, function($a, $b) { return strcmp($b->tahun_ajaran_id, $a->tahun_ajaran_id);});
									foreach ($tahunajaran as $tahun) {?>
									<option value="<?php echo $tahun->tahun_ajaran_id; ?>"><?php echo $tahun->nama_tahun; ?></option>
								<?php }?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Guru Pembimbing</label>
							<select class="form-control" name="guru_id">
								<?php foreach ($guru as $result) {?>
									<option value="<?php echo $result['guru_id']; ?>"><?php echo $result['nama_guru']; ?></option>
								<?php }?>
							</select>
						</div>
                        <hr>
                        <div align="right">
                            <button type="submit" class="btn btn-primary  w-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
