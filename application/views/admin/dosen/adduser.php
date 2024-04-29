<?php $no = 1; foreach ($dosen as $result) {?>
<div class="modal fade adduser<?php echo $result['dosen_id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="custom-validation" action="<?php echo site_url('admin/dosen/reg_user'); ?>" method="post">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert" align="justify">
                        <i class="mdi mdi-bullseye-arrow"></i>
                        <b>Perhatian !</b> username dan pasword default menggunakan NIDN dan Tanggal Lahir.
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="dosen_id"
                            value="<?php echo $result['dosen_id']; ?>" name="dosen_id" required="">
                        <input type="hidden" class="form-control" id="nidn" value="<?php echo $result['nidn']; ?>"
                            name="username" required="">
                        <input type="hidden" class="form-control" name="password"
                            value="<?php echo str_replace('-', '', $result['tanggal_lahir']); ?>">
                    </div>
                    <table class="table" style="background-color: #ddd;">
                        <tbody>
                            <tr>
                                <th style="width: 150px;">Username</th>
                                <td><?php echo $result['nidn']; ?> </td>
                            </tr>
                            <tr>
                                <th style="width: 150px;">Password</th>
                                <td><?php echo str_replace('-', '', $result['tanggal_lahir']); ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="form-group">
                        <div class="custom-control custom-radio custom-radio-outline custom-radio-primary mb-3"
                            style="display: inline-block; margin-right: 20px;">
                            <input type="radio" class="custom-control-input" id="dosen<?php echo $result['dosen_id'] ?>"
                                name="role" value="dosen" required="wajib diisi">
                            <label class="custom-control-label"
                                for="dosen<?php echo $result['dosen_id'] ?>">dosen</label>
                        </div>
                        <div class="custom-control custom-radio custom-radio-outline custom-radio-primary mb-3"
                            style="display: inline-block; margin-right: 20px;">
                            <input type="radio" class="custom-control-input" id="bmsi<?php echo $result['dosen_id'] ?>"
                                name="role" value="bmsi" required="wajib diisi">
                            <label class="custom-control-label" for="bmsi<?php echo $result['dosen_id'] ?>">admin
                                bmsi</label>
                        </div>
                        <div class="custom-control custom-radio custom-radio-outline custom-radio-primary mb-3"
                            style="display: inline-block;">
                            <input type="radio" class="custom-control-input" id="admin<?php echo $result['dosen_id'] ?>"
                                name="role" value="admin" required="wajib diisi">
                            <label class="custom-control-label"
                                for="admin<?php echo $result['dosen_id'] ?>">admin</label>
                        </div>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<?php }?>
