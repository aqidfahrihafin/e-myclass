<?php foreach ($materi as $result) {?>
<!-- add modal -->
<div class="modal fade hapusmateri<?php echo $result->materi_id; ?>" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Hapus Materi </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<div class="alert alert-warning" role="alert" align="center">
						<b>Yakin </b>ingin menghapus data  <span class="badge badge-pill badge-danger font-size-8"><?php echo $result->judul_materi; ?></span>
					</div>
                <form action="<?php echo site_url('admin/materi/delete'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $result->materi_id; ?>"
                            name="materi_id" id="materi_id">
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
