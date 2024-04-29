<?php if ($this->session->flashdata('alert')): ?>
	<div id="alert">
		<?php echo $this->session->flashdata('alert'); ?>
	</div>
	<script>
		setTimeout(function() {
			document.getElementById("alert").remove();
		}, <?php echo $this->session->flashdata('alert_timeout'); ?>);
	</script>
<?php endif; ?>

<?php foreach ($lembaga as $result): ?>
           <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary"></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row" align="center">
                                <div class="col-sm-12">
                                    <div  style="margin-top: 4px; margin-bottom: 4px;">
                                        <img src="<?php echo base_url('upload/logo/'.$result->logo); ?>" class="img-thumbnail rounded-circle" style="width: 100px; height: 100px;">
                                    </div>
                                    <h5 class="font-size-15 text-truncate"><?php echo $result->nama_lembaga; ?></h5>
                                    <p class="text-muted mb-0 text-truncate"><?php echo $user_data->role; ?></p>
                                    <div class="mt-2">
                                        <a href="" class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target=".lembaga<?php echo $result->lembaga_id; ?>">Edit
                                            Profile <i class="mdi mdi-arrow-right ml-1"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Data Lembaga</h4>
                            <div class="table-responsive">
                                <table class="table table-nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Nama Lembaga</th>
                                            <td><?php echo $result->nama_lembaga; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NSM </th>
                                            <td><?php echo $result->nsm; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NPSM </th>
                                            <td><?php echo $result->npsm; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Alamat </th>
                                            <td><?php echo $result->alamat; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Kecamatan </th>
                                            <td><?php echo $result->kecamatan; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Kabupaten/Kota </th>
                                            <td><?php echo $result->kabupaten; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Provinsi </th>
                                            <td><?php echo $result->provinsi; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Pimpinan/Direktur</h4>
                            <div class="table-responsive">
                                <table class="table table-nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Nama Pimpinan </th>
                                            <td><?php echo $result->nama_dosen; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NIP </th>
                                            <td><?php echo $result->nidn; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
<?php endforeach; ?>
			
<?php $this->load->view('admin/profillembaga/edit');?>

