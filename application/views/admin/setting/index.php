
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">

                    <div class="clearfix">
                        <div class="float-right">
                            <div class="input-group input-group-sm">
                                <button type="button" class="btn btn-secondary btn-sm  waves-light">
                                    <i class="bx bx-loader bx-spin font-size-16 align-middle"></i>
                                </button>
                            </div>
                        </div>
                        <h4 class="card-title mb-4"><?php echo $title ?></h4>
                        <hr>
                    </div>

                    <div class="alert alert-primary" role="alert" align="justify">
                        <i class="mdi mdi-bullseye-arrow"></i>
                        <b>Perhatian !</b> Halaman ini digunakan untuk menentukan Sanah Dirasah dan semester default pada
                        halaman aplikasi <b>E-Raport</b>. Silahkan aktifkan Sanah Dirasah dan semester sesuai dengan yang
                        berjalan di madrasah anda.
                    </div>
                    <div class="table-responsive">

                        <form>
                            <div class="form-group">
                                <label class="control-label">Sanah Dirasah</label>
                                <select class="form-control">
                                    <option value="">2023/2024</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Semester</label>
                                <select class="form-control">
                                    <option value="">Ganjil</option>
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
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">

                    <div class="clearfix">
                        <div class="float-right">
                            <div class="input-group input-group-sm">
                                <button type="button" class="btn btn-primary btn-sm waves-effect btn-label waves-light"
                                    data-toggle="modal" data-target=".bs-example-modal-center"><i
                                        class="bx bx-plus label-icon"></i> Add
                                </button>
                            </div>
                        </div>
                        <h4 class="card-title mb-4">Data Sanah Dirasah</h4>
                        <hr>
                    </div>

                    <div class="table-responsive">

                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Kode Tahun</th>
                                    <th>Sanah Dirasah</th>
                                    <th>Status</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>TP2324</td>
                                    <td>2023/2024</td>
                                    <td align="center">
                                        <span class="badge badge-pill badge-success font-size-8">Aktif</span>
                                    </td>
                                    <td align="center">
                                        <button type="button" class="btn btn-warning waves-effect waves-light btn-sm">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light btn-sm">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

	<!-- add modal -->
    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add Sanah Dirasah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="kode">Kode Tahun</label>
                            <input type="text" class="form-control" id="kode">
                        </div>
                        <div class="form-group">
                            <label for="tahun">Sanah Dirasah</label>
                            <input type="text" class="form-control" id="tahun">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <select class="form-control">
                                <option value="">Aktif</option>
                                <option value="">Non Aktif</option>
                            </select>
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
