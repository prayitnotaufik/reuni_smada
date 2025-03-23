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
        <div class="row mb-2 kepala p-2">
            <div class="col-sm-6">
                <h1 class="m-0">UPLOAD RASIO KEHADIRAN</h1>
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
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="exampleInputEmail1">File penilaian Absensi (Template klik <a href="<?= base_url(); ?>uploads_temp/upload_hrga.xlsx">disini</a>)</label>
                                <form action="<?= base_url('penilaian/proses_upload'); ?>" method="POST" enctype="multipart/form-data">
                                    <div class="custom-file mb-2">
                                        <!-- <input type="file" class="custom-file-input" id="customFile" name="file" required> -->
                                        <input type="file" class="custom-file-input" id="customFile" name="file" required>
                                        <label class="custom-file-label" for="customFile">Upload Excel File (.xls | .xlsx)</label>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-primary">SUBMIT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="exampleInputEmail1">File penilaian RANK (Template klik <a href="<?= base_url(); ?>uploads_temp/upload_rank.xlsx">disini</a>)</label>
                                <form action="<?= base_url('penilaian/upload_penilai'); ?>" method="POST" enctype="multipart/form-data">
                                    <div class="custom-file mb-2">
                                        <!-- <input type="file" class="custom-file-input" id="customFile" name="file" required> -->
                                        <input type="file" class="custom-file-input" id="customFile" name="file" required>
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
                        <div class="table-responsive">
                            <table id="tbMain" class="table table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Jumlah Hari Aktual</th>
                                        <th>Hari Hadir Kerja</th>
                                        <th>Rasio Kehadiran</th>
                                        <th>Eval 1</th>
                                        <th>Parameter 1</th>
                                        <th>Eval 2</th>
                                        <th>Parameter 2</th>
                                        <th>Eval 3</th>
                                        <th>Parameter 3</th>
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
        // pageLength: '50',
        ajax: {
            url: '<?= base_url() ?>' + 'penilaian/dt_penilaian_hrga',
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
            console.log()
        }
    });

    function reload_dt() {
        dtIn.ajax.reload(null, true);
        // console.log($('#period').val())
    }
</script>