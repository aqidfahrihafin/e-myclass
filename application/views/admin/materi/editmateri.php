<?php foreach ($materi as $result) {?>
<!-- add modal -->
<div class="modal fade editmateri<?php echo $result->materi_id; ?>" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Edit Materi </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/materi/update'); ?>" method="post"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="materi">Nama Materi</label>
                        <input type="hidden" class="form-control" value="<?php echo $result->materi_id; ?>"
                            name="materi_id" id="materi_id">
                        <input type="text" class="form-control" id="materi" name="judul_materi"value="<?php echo $result->judul_materi; ?>">
                    </div>
					<div class="form-group">
                        <label for="dokumen">Dokumen Materi</label>
						<input type="file" class="form-control" name="dokumen" id="dokumen" value="<?php echo $result->dokumen; ?>">
						<small style="color: orange;">Ukuran file maksimal *500 Kb</small>
                    </div>		
					<div class="form-group">
                        <label for="isi_materi">Ringkasan Materi</label>
                        <textarea class="form-control summernote" id="isi_materi" name="isi_materi"><?php echo $result->isi_materi; ?></textarea>
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
