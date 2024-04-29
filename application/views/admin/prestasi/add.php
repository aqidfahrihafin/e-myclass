<div class="modal fade prestasi" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalAddPrestasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddPrestasiLabel">Add <?php echo $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/prestasi/simpan'); ?>" method="post">
                
					<div class="form-group">
						<label for="selectSantri">Pilih Santri</label>
						<select class="form-control select2" id="selectSantri" name="mahasiswa_id" required>
							<?php foreach ($mahasiswa as $result) { ?>
								<option value="<?php echo $result->mahasiswa_id; ?>"><?php echo $result->nama_mahasiswa; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="selectTingkat">Tingkat</label>
						<select class="form-control select2" id="selectTingkat" name="tingkat_prestasi" required>
							<option value="Desa">Desa</option>
							<option value="Kecamatan">Kecamatan</option>
							<option value="Kabupaten">Kabupaten</option>
							<option value="Nasional">Nasional</option>
							<option value="Internasional">Internasional</option>
						</select>
					</div>

                    <div class="form-group">
                        <label for="jenis">Jenis Prestasi</label>
                        <input type="text" class="form-control" name="jenis_prestasi" id="jenis" placeholder="Jenis Prestasi" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Prestasi</label>
                        <input type="text" class="form-control" name="nama_prestasi" id="nama" placeholder="Nama Prestasi" required>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="number" class="form-control" name="tahun_prestasi" id="tahun" min="2024" max="2099" placeholder="Tahun Prestasi" pattern="[0-9]{4}" required>
                    </div>
                    <div class="form-group">
                        <label for="penyelenggara">Penyelenggara</label>
                        <input type="text" class="form-control" name="penyelenggara" id="penyelenggara" placeholder="Penyelenggara" required>
                    </div>
                    <div class="form-group">
                        <label for="peringkat">Peringkat</label>
                        <input type="text" class="form-control" name="peringkat" id="peringkat" placeholder="Peringkat" required>
                    </div>
                    <hr>
                    <div align="right">
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
