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
                <h1 class="m-0">MANAGE MY PROJECT</h1>
                <p class="m-0">Update your new project or add your progress to an existing project</p>
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
                        <div class="row">
                            <div class="col-md-2">
                                <!-- <button class="btn btn-primary">Add Applicant</button> -->
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-add">
                                    Add Project
                                </button>
                            </div>
                        </div>
                        <!-- <div class="row mt-3">
                            <div class="col-md-2 ">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Select Fiscal</option>
                                        <option>FY 198</option>
                                        <option>FY 199</option>
                                        <option>FY 200</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-primary">Generate</button>
                            </div>
                        </div> -->
                        <div class="div table-responsive mt-3">
                            <table id="tbMain" class="table table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th width="2%">#</th>
                                        <th>Project Name</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Screenshot</th>
                                        <th>Url</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                        <th>Action</th>
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

<div class="modal fade" id="modal-add" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?= base_url('manage/add_project'); ?>" enctype="multipart/form-data" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Project Name / Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Project Name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="3" placeholder="Enter Description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control category" id="category" name="category">
                                <option></option>
                                <option value="rpa">Robotic Processing Automation (RPA)</option>
                                <option value="web">Web Application</option>
                                <option value="network">Network Improvement</option>
                                <option value="hardware">Hardware Repair</option>
                                <option value="iot">Internet of Things</option>
                                <option value="robotic">Robotic / Automation</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="Enter Url">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Screenshot / Photo</label>
                            <div class="input-group">
                                <div class="custom-file mb-2">
                                    <!-- <input type="file" class="custom-file-input" id="customFile" name="file" > -->
                                    <input type="file" class="custom-file-input" id="customFile" multiple="" name="screenshot[]" accept=".jpg,.jpeg,.png">
                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <!-- <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>
<div class="modal fade" id="modal-edit" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDIT PROJECT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('manage/edit_project'); ?>" enctype="multipart/form-data" method="POST">
                    <input type="hidden" id="tiket" name="tiket" value="">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Project Name / Title</label>
                            <input type="text" class="form-control" id="edit_title" name="title" placeholder="Enter Project Name">
                        </div>
                        <div class="form-group">
                            <label for="title">Date</label>
                            <input type="text" class="form-control" id="edit_date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="3" placeholder="Enter Description" id="edit_description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control category" id="edit_category" name="category">
                                <option></option>
                                <option value="rpa">Robotic Processing Automation (RPA)</option>
                                <option value="web">Web Application</option>
                                <option value="network">Network Improvement</option>
                                <option value="hardware">Hardware Repair</option>
                                <option value="iot">Internet of Things</option>
                                <option value="robotic">Robotic / Automation</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" class="form-control" id="edit_url" name="url" placeholder="Enter Url">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Screenshot / Photo</label>
                            <div class="input-group">
                                <div class="custom-file mb-2">
                                    <!-- <input type="file" class="custom-file-input" id="edit_customFile" name="file" > -->
                                    <input type="file" class="custom-file-input" id="edit_customFile" multiple="" name="screenshot[]" accept=".jpg,.jpeg,.png">
                                    <label class="custom-file-label" for="customFile">Upload File</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Project Status</label>
                            <select class="form-control" id="edit_status" name="status">
                                <option value="0">Active</option>
                                <option value="1">Closed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <!-- <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>
<div class="modal fade" id="modal-progress" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ADD TASK/PROGRESS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form action="<?= base_url('manage/edit_project'); ?>" enctype="multipart/form-data" method="POST"> -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="description">Task Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter Description" id="task_description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Have Evidence/Photo?</label>
                        <div class="input-group">
                            <div class="custom-file mb-2">
                                <!-- <input type="file" class="custom-file-input" id="edit_customFile" name="file" > -->
                                <input type="file" class="custom-file-input" id="evidence" name="screenshot" accept=".jpg,.jpeg,.png">
                                <label class="custom-file-label" for="customFile">Upload File</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Add your progress? (in %)</label>
                        <input type="text" class="form-control" id="add_progress" name="progress">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
                        <button id="submit_progress" type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
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
<!-- /.content -->
<?php $this->load->view('foot'); ?>
<script>
    $(document).ready(function() {
        $('.category').select2({
            placeholder: "Select Category",
            allowClear: true
        });
        $('.select2-selection').css("height", "2.5rem")
        $('.select2-selection__arrow').css("height", "2.5rem")
        $('.select2-selection__rendered').css("line-height", "2.5rem")
        $('.select2-results__options').css("line-height", "2.5rem")
        $('#edit_date').datetimepicker({
            format: 'Y-m-d H:i:s', // Date and time format
            step: 30, // Time step in minutes
            minDate: 0 // Disable past dates
        });
    });



    dtIn = $("#tbMain").DataTable({
        // pageLength: '25',
        // columnDefs: [{
        //     target: 0,
        //     visible: false,
        // }, {
        //     target: 3,
        //     visible: false,
        // }],
        "paging": true,
        // "responsive": true,
        ajax: {
            url: '<?= base_url() ?>' + 'manage/dt_project',
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
            url: '<?= base_url() ?>' + 'manage/dt_detail',
            method: 'post',
            data: function(a) {
                a.tiket = $('#tiket').val();
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

    dt_tiket = ''

    $('#tbMain').on('click', '#edit', function() {
        // var data = dtIn.row($(this).parents('tr')).data();
        var data = $(this).data('detail')
        console.log(data)

        $('#tiket').val(data.tiket)
        $('#edit_title').val(data.title)
        $('#edit_date').val(data.created_at)
        $('#edit_category').val(data.category).trigger('change')
        $('#edit_url').val(data.url)
        $('#edit_description').val(data.description)
        $('#edit_status').val(data.status)

        // $('#edit_date').datetimepicker({
        //     mask: true
        //     // inline: true,
        //     // format: 'HH:mm'
        // })

        // $('#edit_category').trigger('change');
        // $('#edit_end').val(data[5])
        // $("input[name='edit_remark'][value='" + data[6] + "']").prop('checked', true)

        $('#modal-edit').modal('toggle');

        $('#modal-edit').on('shown.bs.modal', function() {
            // xxx
        })
    });

    $('#tbMain').on('click', '#progress', function() {
        // var data = dtIn.row($(this).parents('tr')).data();

        var data = $(this).data('detail')

        $('#tiket').val(data.tiket)
        $('#add_progress').val(data.progress)
        console.log($('#tiket').val())



        // $('#edit_category').trigger('change');
        // $('#edit_end').val(data[5])
        // $("input[name='edit_remark'][value='" + data[6] + "']").prop('checked', true)

        $('#modal-progress').modal('toggle');

        $('#modal-progress').on('shown.bs.modal', function() {
            // xxx
        })
    });

    $('#tbMain').on('click', '#detail', function() {
        // var data = dtIn.row($(this).parents('tr')).data();
        var data = $(this).data('detail')
        console.log(data)

        $('#tiket').val(data.tiket)
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

    $('#submit_progress').on('click', function() {

        datasubmit = {
            'tiket': $('#tiket').val(),
            'task_desc': $('#task_description').val(),
            'progress': $('#add_progress').val(),
            // 'tiket': $('#tiket').val(),
        }

        var file_data = $('#evidence').prop('files')[0];
        var formData = new FormData();

        formData.append('evidence', file_data);
        formData.append('datasubmit', JSON.stringify(datasubmit));

        // console.log(formData)

        $.ajax({
            url: '<?= base_url("manage/add_progress") ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                res = JSON.parse(response)
                $('#modal-progress').modal('hide');
                reload_dt()
                $('#task_description').val('')
                $('#evidence').val('')
                $('#add_progress').val('')
                toastr.success(res.success)
            },
            error: function(response) {
                toastr.error('Upload gagal !')
            }
        });


        console.log(datasubmit)
    })

    function reload_dt() {
        dtIn.ajax.reload(null, true);
        // console.log($('#period').val())
    }

    // magnify
    window.prettyPrint && prettyPrint();

    var defaultOpts = {
        draggable: true,
        resizable: true,
        movable: true,
        keyboard: true,
        title: true,
        modalWidth: 320,
        modalHeight: 320,
        fixedContent: true,
        fixedModalSize: false,
        initMaximized: false,
        gapThreshold: 0.02,
        ratioThreshold: 0.1,
        minRatio: 0.05,
        maxRatio: 16,
        headToolbar: ['maximize', 'close'],
        footToolbar: ['zoomIn', 'zoomOut', 'prev', 'fullscreen', 'next', 'actualSize', 'rotateRight'],
        multiInstances: true,
        initEvent: 'click',
        initAnimation: true,
        fixedModalPos: false,
        zIndex: 1090,
        dragHandle: '.magnify-modal',
        progressiveLoading: true
    };
</script>