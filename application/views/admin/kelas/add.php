 <!-- modal add  -->
 <div class="modal fade kelas" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
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
                            <label for="target">Tahun Akademik</label>
                            <input type="text" readonly class="form-control" id="target" value="<?php echo $semester->nama_tahun; ?>  <?php echo $semester->semester; ?>">
                            <input type="hidden" class="form-control" id="target" name="tahun_ajaran_id" value="<?php echo $semester->tahun_ajaran_id; ?>">
                        </div>			
                        <div class="form-group">
                            <label for="tahun">Nama Kelas</label>
                            <input type="text" class="form-control" name="nama_kelas" id="tahun">
                        </div>
						<div class="form-group">
							<label class="control-label">Prodi</label>
							<select class="form-control" name="prodi_id" >
								<?php $no = 1; foreach ($prodi as $result) {?>		
									<option value="<?php echo $result->prodi_id; ?>"><?php echo $result->nama_prodi; ?></option>
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
