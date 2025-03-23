<?php $this->load->view('head'); ?>

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
                <h1 class="m-0">LIST PENILAIAN KARYAWAN</h1>
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
                    <div class="card-header">
                        <h3 class="card-title">Data Kehadiran</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
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
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Section</th>
                                        <!-- <th>Bagian</th> -->
                                        <th>Grade</th>
                                        <th>Join Date</th>
                                        <th>Penilai 1</th>
                                        <th>Penilai 2</th>
                                        <th>Penilai 3</th>
                                        <th>Karyawan</th>
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
<!-- /.content -->

<?php $this->load->view('foot'); ?>
<script>
    dtIn = $("#tbMain").DataTable({
        // pageLength: '25',
        "paging": true,
        // "responsive": true,
        ajax: {
            url: '<?= base_url() ?>' + 'penilaian/dt_master_karyawan',
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

    function reload_dt() {
        dtIn.ajax.reload(null, true);
        // console.log($('#period').val())
    }
</script>