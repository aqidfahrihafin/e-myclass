<?php foreach ($matakuliah as $result) {?>
<!-- add modal -->
<div class="modal fade matakuliah<?php echo $result->matakuliah_id; ?>" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Edit Data matakuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/makul/update'); ?>" method="post">
                    <div class="form-group">
                        <label for="matakuliah">Nama matakuliah</label>

                        <input type="hidden" class="form-control" value="<?php echo $result->matakuliah_id; ?>"
                            name="matakuliah_id" id="matakuliah_id">
                        <input type="text" class="form-control" id="matakuliah"
                            value="<?php echo $result->nama_matakuliah; ?>" name="nama_matakuliah">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Dosen Pengampu</label>
                        <select class="form-control" name="dosen_id">
                            <?php foreach ($dosen as $dosenItem) {?>
                            <option value="<?php echo $dosenItem['dosen_id']; ?>"
                                <?php echo ($dosenItem['dosen_id'] == $result->dosen_id) ? 'selected' : ''; ?>>
                                <?php echo $dosenItem['nama_dosen']; ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_sks">Jumlah SKS</label>
                        <input type="number" class="form-control" name="jumlah_sks" id="jumlah_sks"
                            value="<?php echo $result->jumlah_sks; ?>">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Matakuliah</label>
                        <textarea class="form-control" name="deskripsi"
                            id="deskripsi"><?php echo $result->deskripsi; ?></textarea>
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
