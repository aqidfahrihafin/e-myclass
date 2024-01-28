    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <div class="clearfix">
                        <div class="float-right">
                            <div class="input-group input-group-sm">
                                <button type="button" class="btn btn-primary btn-sm waves-effect btn-label waves-light"><i
                                        class="bx bx-plus label-icon"></i> Add
                                </button>
                            </div>
                        </div>
                        <h4 class="card-title mb-4"><?php echo $title ?></h4>
                        <hr>
                    </div>

                    <div class="table-responsive">

                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Apin</td>
                                    <td>0909090</td>
                                    <td>Laki-laki</td>
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
