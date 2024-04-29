<?php foreach ($lembaga as $result): ?>
    <div class="modal fade lembaga<?php echo $result->lembaga_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
            aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Edit <?php echo $title ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url('admin/lembaga/update_lembaga'); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="lembaga_id" value="<?php echo $result->lembaga_id; ?>">
                        <div class="form-group">
                            <label for="nama_lembaga">Nama lembaga</label>
                            <input type="text" class="form-control" name="nama_lembaga" value="<?php echo $result->nama_lembaga; ?>" id="nama_lembaga">
                        </div>
                        <div class="form-group">
                            <label for="nsm">NSM</label>
                            <input type="text" class="form-control" name="nsm" value="<?php echo $result->nsm; ?>" id="nsm">
                        </div>
                        <div class="form-group">
                            <label for="npsm">NPSM</label>
                            <input type="text" class="form-control" name="npsm" value="<?php echo $result->npsm; ?>" id="npsm">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat"><?php echo $result->alamat; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" name="kecamatan" value="<?php echo $result->kecamatan; ?>" id="kecamatan">
                        </div>
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten/Kota</label>
                            <input type="text" class="form-control" name="kabupaten" value="<?php echo $result->kabupaten; ?>" id="kabupaten">
                        </div>
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" class="form-control" name="provinsi" value="<?php echo $result->provinsi; ?>" id="provinsi">
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" class="form-control" name="logo" value="<?php echo $result->logo; ?>" id="logo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" align="center">
                                        <label for="previewLogo"></label>
                                        <img src="<?php echo base_url('upload/logo/'.$result->logo); ?>" width="80px" alt="Logo" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label for="provinsi" style="color: blue;">Data Direktur/Pimpinan</label>
                        <div class="form-group">
							<label class="control-label">Pilih Direktur/Pimpinan</label>
							 <select class="form-control" name="dosen_id">
								<option value="">Pilih Dosen</option>
								<?php foreach ($dosen as $dosen_item): ?>
									<option value="<?php echo $dosen_item['dosen_id']; ?>" <?php echo ($dosen_item['dosen_id'] == $result->dosen_id) ? 'selected' : ''; ?>>
										<?php echo $dosen_item['nama_dosen']; ?>
									</option>
								<?php endforeach; ?>
							</select>

						</div>
                        <hr>
                        <div align="right">
                            <button type="submit" class="btn btn-primary  w-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
