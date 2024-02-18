 <!-- modal add  -->
 <div class="modal fade dataajar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
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
                    <form action="<?php echo site_url('admin/datamengajar/simpan'); ?>" method="post">		
					
						<div class="form-group">
							<label class="control-label">Kelas</label>
							<select class="form-control" name="kelas_id">
								<?php usort($kelas, function($a, $b) { return strcmp($b->kelas_id, $a->kelas_id);});
									foreach ($kelas as $result) {?>
									<option value="<?php echo $result->kelas_id; ?>"><?php echo $result->kelas; ?> <?php echo $result->jenis_kelas; ?> - <?php echo $result->nama_tahun; ?></option>
								<?php }?>
							</select>
						</div>	
						<div class="form-group">
							<label class="control-label">Mata Pelajaran</label>
							<select class="form-control" name="mapel_id">
								<option value="">Pilih Pelajaran</option> 
								<?php usort($mapel, function($a, $b) { return strcmp($b->mapel_id, $a->mapel_id);});
									foreach ($mapel as $result) {?>
									<option value="<?php echo $result->mapel_id; ?>"><?php echo $result->kode_mapel; ?>-<?php echo $result->nama_mapel; ?></option>
								<?php }?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Guru Pengajar</label>
							
							<select class="form-control" name="guru_id">
									<option value="">Pilih Data Guru</option> 
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
