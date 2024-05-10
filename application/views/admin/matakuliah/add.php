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
                 <form action="<?php echo site_url('admin/makul/simpan'); ?>" method="post">
                     <div class="form-group">
                         <label class="control-label">Kelas</label>
                         <select class="form-control" name="kelas_id">
                             <?php $no = 1; foreach ($kelas as $result) {?>
                             <option value="<?php echo $result->kelas_id; ?>"><?php echo $result->nama_kelas; ?>
                             </option>
                             <?php }?>
                         </select>
                     </div>
                     <?php if ($this->session->userdata('role') === 'admin') { ?>
                     <!-- Tampilan untuk admin -->
                     <div class="form-group">
                         <label for="select2">Dosen Pengampu</label>
                         <select class="form-control select2" id="select2" name="dosen_id">
                             <?php foreach ($dosen as $result) {?>
                             <option value="<?php echo $result['dosen_id']; ?>"><?php echo $result['nama_dosen']; ?>
                             </option>
                             <?php }?>
                         </select>
                     </div>
                     <?php } else if ($this->session->userdata('role') === 'dosen') { ?>
                     <!-- Tampilan untuk dosen -->
                     <input type="hidden" name="dosen_id" value="<?php echo $this->session->userdata('user_id'); ?>">
                     <?php } ?>

                     <div class="form-group">
                         <label for="matakuliah">Matakuliah</label>
                         <input type="text" class="form-control" name="nama_matakuliah" id="matakuliah">
                     </div>
                     <div class="form-group">
                         <label for="jumlah_sks">Jumlah SKS</label>
                         <input type="number" class="form-control" name="jumlah_sks" id="jumlah_sks">
                     </div>
                     <div class="form-group">
                         <label for="deskripsi">Deskripsi Matakuliah</label>
                         <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
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
