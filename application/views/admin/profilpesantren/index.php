    <?php foreach ($pesantren as $result): ?>
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
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <img src="<?php echo base_url('public/assets/');?>images/logo1.png" alt=""
                                            class="img-thumbnail rounded-circle">
                                    </div>
                                    <h5 class="font-size-15 text-truncate"><?php echo $result['nama_lembaga']; ?></h5>
                                    <p class="text-muted mb-0 text-truncate">admin</p>
                                    <div class="mt-2">
                                        <a href="" class="btn btn-primary waves-effect waves-light btn-sm">Edit
                                            Profile <i class="mdi mdi-arrow-right ml-1"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Ubah Password</h4>
                            <form>
                                <div class="form-group">
                                    <label for="formrow-password-input">Password Lama</label>
                                    <input type="password" class="form-control" id="formrow-password-input">
                                </div>
                                <div class="form-group">
                                    <label for="formrow-passwordbaru-input">Password Baru</label>
                                    <input type="password" class="form-control" id="formrow-passwordbaru-input">
                                </div>
                                <div class="form-group">
                                    <label for="formrow-passwordconfirmasi-input">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="formrow-passwordconfirmasi-input">
                                </div>
                                <div align="right">
                                    <button type="submit" class="btn btn-primary  w-md">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end card -->

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Data Pesantren</h4>
                            <div class="table-responsive">
                                <table class="table table-nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Nama </th>
                                            <td><?php echo $result['nama_lembaga']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NSM </th>
                                            <td><?php echo $result['nsm']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NPSM </th>
                                            <td><?php echo $result['npsm']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Alamat </th>
                                            <td><?php echo $result['alamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Kecamatan </th>
                                            <td><?php echo $result['kecamatan']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Kabupaten/Kota </th>
                                            <td><?php echo $result['kabupaten']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Provinsi </th>
                                            <td><?php echo $result['provinsi']; ?></td>
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
                                            <td><?php echo $result['pimpinan']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NIP </th>
                                            <td><?php echo $result['nip']; ?></td>
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