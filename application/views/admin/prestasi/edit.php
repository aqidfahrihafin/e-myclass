<?php foreach ($kelas as $result) {?>
	<!-- add modal -->
    <div class="modal fade kelas<?php echo $result->kelas_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Edit Data Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<form action="<?php echo site_url('admin/kelas/update'); ?>" method="post">
						<div class="form-group">
							<label for="kode">Kode Kelas</label>
							<input type="hidden" class="form-control" value="<?php echo $result->kelas_id; ?>" name="kelas_id" id="kelas_id" >
							<input type="text" class="form-control" value="<?php echo $result->kode_kelas; ?>" id="kode" readonly>
						</div>
						<div class="form-group">
							<label for="kelas">Nama Kelas</label>
							<input type="text" class="form-control" id="kelas" value="<?php echo $result->kelas; ?>" name="kelas">
						</div>
						<div class="form-group">
							<label for="target_kelas">Target Kelas/Semester</label>
							<input type="text" class="form-control" id="target_kelas" value="<?php echo $result->target_kelas; ?>" name="target_kelas">
						</div>
						<div class="form-group">
							<label class="control-label">Nama Kelas</label>
							<select class="form-control" name="jenis_kelas">
								<option value="Putra" <?php if ($result->jenis_kelas == "Putra") echo "selected"; ?>>Putra</option>
								<option value="Putri" <?php if ($result->jenis_kelas == "Putri") echo "selected"; ?>>Putri</option>
							</select>
						</div>

						<div class="form-group">
							<label class="control-label">Sanah Dirasah</label>
							<select class="form-control" name="tahun_ajaran_id">
								<?php foreach ($tahunajaran as $tahun) {?>
									<option value="<?php echo $tahun->tahun_ajaran_id; ?>" <?php if ($tahun->tahun_ajaran_id == $result->tahun_ajaran_id) echo "selected"; ?>><?php echo $tahun->nama_tahun; ?></option>
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
							<button type="submit" class="btn btn-primary w-md">Submit</button>
						</div>
					</form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php }?>
