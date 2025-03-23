<?php $this->load->view('head'); ?>

<head>

</head>

<style>
    .card-input-element {
        display: none;
    }

    .card-input {
        margin: 10px;
        padding: 0px;
    }

    .card-input:hover {
        cursor: pointer;
    }

    .card-input-element:checked+.card-input {
        box-shadow: 0 0 1px 1px #2ecc71;
    }

    .kepala {
        /* border: 5px solid aqua; */
        background-color: aqua;
        color: black;
    }
</style>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 p-2">
            <div class="col-sm-6">
                <h1 class="m-0">PROJECT LIST</h1>
                <!-- <p class="m-0">Golongan Khusus – Produksi untuk Grade E1 ~ E4</p> -->
            </div>
            <!-- /.col -->
            <!-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div> -->
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 d-none">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <label for="exampleInputEmail1">File penilaian (Template klik <a href="<?= base_url(); ?>uploads_temp/upload_hrga.xlsx">disini</a>)</label>
                                <form action="<?= base_url('penilaian/proses_upload'); ?>" method="POST" enctype="multipart/form-data">
                                    <div class="custom-file mb-2">
                                        <!-- <input type="file" class="custom-file-input" id="customFile" name="file" required> -->
                                        <input type="file" class="custom-file-input" id="customFile" name="file">
                                        <label class="custom-file-label" for="customFile">Upload Excel File (.xls | .xlsx)</label>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-primary">SUBMIT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <!-- <div class="card-header">
                        <h3 class="card-title">Data Kehadiran</h3>
                    </div> -->
                    <div class="card-body">
                        <div class="row d-none">
                            <div class="col-md-2 mb-5">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Select Fiscal</option>
                                        <option>FY 198</option>
                                        <option>FY 199</option>
                                        <option>FY 200</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 mb-5">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Semester</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-primary">Generate</button>
                            </div>
                        </div>
                        <div class="div table-responsive">
                            <table id="tbMain" class="table table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th width="2%">#</th>
                                        <th>Project Name</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>Screenshot</th>
                                        <th>Url</th>
                                        <th>Progress</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<div class="modal fade" id="modal-detail" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">PROJECT DETAILS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form action="<?= base_url('manage/edit_project'); ?>" enctype="multipart/form-data" method="POST"> -->
                <!-- <input type="hidden" id="tiket" value=""> -->
                <div class="card-body">
                    <table id="tbDetail" class="table table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <th width="2%">#</th>
                                <th>Task Detail</th>
                                <th width="40%">Evidence</th>
                                <th>Pic</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <!-- </form> -->
            </div>
            <!-- <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

<?php $this->load->view('foot'); ?>
<script>
    tiket = ''

    dtIn = $("#tbMain").DataTable({
        // pageLength: '25',
        "paging": true,
        // "responsive": true,
        ajax: {
            url: '<?= base_url() ?>' + 'projects/dt_project',
            method: 'post',
            data: function(a) {
                a.tgl = $('#period').val();
            },
            dataSrc: function(json) {
                return json.data;
            },
            error: function() {
                alert('Terjadi kesalahan pada server');
            }
        },
        initComplete: function(a, b) {
            // console.log()
            // $(this).wrap('<div class="table-responsive"></div>') $(this).css({
            //     width: '100%'
            // });
            // $(this).css('width', '100%')
            // $(this).css('overflow', 'auto')
        }
    });

    var dtDetail = $("#tbDetail").DataTable({
        "autoWidth": false,
        "columnDefs": [{
                "width": "2%",
                "targets": 0
            }, // Set 20% width for the first column
        ],
        "paging": true,
        // "responsive": true,
        ajax: {
            url: '<?= base_url() ?>' + 'projects/dt_detail',
            method: 'post',
            data: function(a) {
                a.tiket = tiket;
            },
            dataSrc: function(json) {
                return json.data;
            },
            error: function() {
                alert('Terjadi kesalahan pada server');
            }
        },
        initComplete: function(a, b) {
            // console.log()
            // $(this).wrap('<div class="table-responsive"></div>') $(this).css({
            //     width: '100%'
            // });
            // $(this).css('width', '100%')
            // $(this).css('overflow', 'auto')
        }
    });

    $('#tbMain').on('click', '#detail', function() {
        // var data = dtIn.row($(this).parents('tr')).data();
        var data = $(this).data('detail')
        console.log(data)

        tiket = data.tiket
        $('#add_progress').val(data.progress)

        // dtDetail.draw();

        $('#edit_title').val(data.title)
        $('#edit_category').val(data.category).trigger('change')
        $('#edit_url').val(data.url)
        $('#edit_description').val(data.description)

        dtDetail.ajax.reload();

        // $('#edit_category').trigger('change');
        // $('#edit_end').val(data[5])
        // $("input[name='edit_remark'][value='" + data[6] + "']").prop('checked', true)

        $('#modal-detail').modal('toggle');

        $('#modal-detail').on('shown.bs.modal', function() {

            // xxx
        })
    });

    function reload_dt() {
        dtIn.ajax.reload(null, true);
        // console.log($('#period').val())
    }
</script>