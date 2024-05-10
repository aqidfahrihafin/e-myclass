<?php foreach ($matakuliah as $result) {?>
<!-- add modal -->
<div class="modal fade addmateri<?php echo $result->matakuliah_id; ?>" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Add Materi </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/materi/addmateri'); ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="matakuliah">Nama Materi</label>
                        <input type="hidden" class="form-control" value="<?php echo $result->matakuliah_id; ?>"
                            name="matakuliah_id" id="matakuliah_id">
                        <input type="hidden" class="form-control" value="<?php echo $result->kelas_id; ?>"
                            name="kelas_id" id="kelas_id">
                        <input type="text" class="form-control" id="materi" name="judul_materi">
                    </div>
                    <div class="form-group">
                        <label for="dokumen">Dokumen Matakuliah</label>
                        <input type="file" class="form-control" name="dokumen" id="dokumen" accept=".pdf">
                        <small style="color: orange;">Ukuran file maksimal *500 Kb</small>
                    </div>
                    <div class="form-group">
                        <label for="isi_materi">Ringkasan Materi</label>
                        <textarea class="form-control summernote" id="isi_materi" name="isi_materi"></textarea>
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
