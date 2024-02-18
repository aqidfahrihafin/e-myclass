 <!-- modal add  -->
 <div class="modal fade prestasi" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
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
                    <form action="<?php echo site_url('admin/prestasi/simpan'); ?>" method="post">				
                        
						<div class="form-group">
							<label class="control-label">Pilih Santri</label>
							<select class="form-control" name="santri_id">
									<?php $no = 1; foreach ($santri as $result)  { ?>
									<option value="<?php echo $result->santri_id; ?>"><?php echo $result->nama_santri; ?></option>
									<?php  }  ?>
							</select>
						 </div>
						 <div class="form-group">
							<label class="control-label">Tingkat</label>
							<select class="form-control" name="tingkat_prestasi">
								<option value="Desa">Desa</option>
								<option value="Kecamatan">Kecamatan</option>
								<option value="Kabupaten">Kabupaten</option>
								<option value="Nasional">Nasional</option>
								<option value="Internasional">Internasional</option>
							</select>
						</div>
						<div class="form-group">
                            <label for="target">JenisPrestasi</label>
                            <input type="text" class="form-control" name="jenis_prestasi" id="target" placeholder="Jenis Prestasi">
                        </div>
						<div class="form-group">
                            <label for="target">Nama Prestasi</label>
                            <input type="text" class="form-control" name="nama_prestasi" id="target" placeholder="Nama Prestasi">
                        </div>
						<div class="form-group">
                            <label for="target">Tahun</label>
                      		<input type="number" class="form-control" name="tahun_prestasi" id="target" min="2024" max="2099" placeholder="Tahun Prestasi" pattern="[0-9]{4}">
                        </div>
						<div class="form-group">
                            <label for="target">Penyelenggara</label>
                            <input type="text" class="form-control" name="penyelenggara" id="target" placeholder="Penyelenggara">
                        </div>
						<div class="form-group">
                            <label for="target">Peringkat</label>
                            <input type="text" class="form-control" name="peringkat" id="target" placeholder="Peringkat">
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
