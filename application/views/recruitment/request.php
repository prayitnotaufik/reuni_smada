<?php $this->load->view('head'); ?>

<script>
    // document.body.classList.add('sidebar-collapse')
</script>

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
        /* background-color: dimgrey; */
        background-color: #caffbf;
    }

    .kepala {
        /* border: 5px solid aqua; */
        background-color: aqua;
        color: black;
    }

    .card-body.p-0 .table tbody>tr>td:last-of-type,
    .card-body.p-0 .table tbody>tr>th:last-of-type,
    .card-body.p-0 .table tfoot>tr>td:last-of-type,
    .card-body.p-0 .table tfoot>tr>th:last-of-type,
    .card-body.p-0 .table thead>tr>td:last-of-type,
    .card-body.p-0 .table thead>tr>th:last-of-type {
        padding-right: 0.75rem;
    }

    .signature-pad {
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 150px;
        height: 150px;
    }

    svg {
        width: 80%;
    }

    /* .card-yemi {
        background-color: #802f8b !important;
    } */

    .card-yemi:not(.card-outline)>.card-header {
        background-color: #802f8b;
    }

    .bg-yemi {
        background-color: #802f8b;
        color: #fff;
        color: #fff;
        /* background-color: #0069d9; */
        border-color: #0062cc;
        box-shadow: 0 0 0 0 rgba(38, 143, 255, .5);
    }
</style>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 p-2">
            <div class="col text-center">
                <h1 class="m-0">EMPLOYEE RECRUITMENT FORM</h1>
                <p class="m-0">(Form Perekrutan Karyawan)</p>
            </div><!-- /.col -->
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-yemi">
                    <div class="card-header">
                        <h3 class="card-title">DATA PEMOHON</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <label for="exampleInputEmail1">Nama</label>
                                <select id="select-nama" class="form-control kode" aria-label="Default select example" name="model">
                                    <option></option>
                                    <?php foreach ($user as $key => $val) { ?>
                                        <option value="<?= $val->username; ?>"><?= $val->fullname ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="exampleInputEmail1">Jabatan</label>
                                <input id="jabatan" type="text" class="form-control" readonly>
                            </div>
                            <div class="col-3">
                                <label for="exampleInputEmail1">Departemen</label>
                                <input id="dept" type="text" class="form-control" readonly>
                            </div>
                            <div class="col-3">
                                <label for="exampleInputEmail1">Tanggal</label>
                                <input id="date" type="date" class="form-control" value="<?= date('Y-m-d'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row"> -->
            <div class="col-md-12">
                <div class="card card-primary card-yemi">

                </div>
                <div class="card card-primary card-yemi">
                    <div class="card-header">
                        <h3 class="card-title">DATA PERMINTAAN</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th width="40%">Jenis Perekrutan</th>
                                    <th width="30%">Nomor Job Order</th>
                                    <th>Tanggal Mulai Bekerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="vertical-align: middle;">
                                        <div class="clearfix">
                                            <div class="icheck-success d-inline form-check-inline">
                                                <input type="radio" name="jenis_perekrutan" checked="" id="radioSuccess1" value="penambahan">
                                                <label for="radioSuccess1">
                                                    Penambahan
                                                </label>
                                            </div>
                                            <div class="icheck-success d-inline form-check-inline">
                                                <input type="radio" name="jenis_perekrutan" id="radioSuccess2" value="penggantian">
                                                <label for="radioSuccess2">
                                                    Penggantian
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input id="" type="text" class="form-control" name="job_order">
                                    </td>
                                    <td>
                                        <input id="" type="date" class="form-control" name="tgl_in" value="<?= date('Y-m-d'); ?>">

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card card-primary card-yemi">
                    <div class="card-body p-0">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th width="40%">Status Karyawan</th>
                                    <th width="30%">Jabatan</th>
                                    <th>Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="vertical-align: middle;">
                                        <div class="clearfix">
                                            <div class="icheck-primary d-inline form-check-inline">
                                                <input type="radio" name="status_karyawan" checked="" id="radioSuccess3" value="tetap/percobaan">
                                                <label for="radioSuccess3">
                                                    Tetap/Percobaan
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline form-check-inline">
                                                <input type="radio" name="status_karyawan" id="radioSuccess4" value="kontrak">
                                                <label for="radioSuccess4">
                                                    Kontrak
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input id="" type="text" class="form-control" name="jabatan">
                                    </td>
                                    <td>
                                        <input id="" type="text" class="form-control" name="grade">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card card-primary card-yemi">
                    <div class="card-header">
                        <h3 class="card-title">KEBUTUHAN KARYAWAN</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <!-- <th width="5%">#</th> -->
                                    <th width="">Sub Section/Process</th>
                                    <th width="">Jumlah MP</th>
                                    <th width="">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- <td>
                                        1
                                    </td> -->
                                    <td>
                                        <input id="" type="text" class="form-control" name="section">
                                    </td>
                                    <td>
                                        <input id="" type="text" class="form-control" name="total_mp">
                                    </td>
                                    <td>
                                        <input id="" type="text" class="form-control" name="keterangan">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card card-primary card-yemi">
                    <div class="card-header">
                        <h3 class="card-title">KUALIFIKASI</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-bordered ">
                            <tbody>
                                <tr>
                                    <td width="5%">
                                        1.
                                    </td>
                                    <td>
                                        <b>PERSONAL</b><br>
                                        kualifikasi pribadi calon karyawan yang dibutuhkan sesuai dengan pekerjaan
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="personal"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="5%">
                                        2.
                                    </td>
                                    <td>
                                        <b>KOMPETENSI</b><br>
                                        pengetahuan, keterampilan, perilaku calon karyawan yang dibutuhkan sesuai dengan pekerjaan
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="kompetensi"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="5%">
                                        3.
                                    </td>
                                    <td>
                                        <b>KHUSUS</b><br>
                                        kualifikasi khusus lainnya (pendidikan, sertifikasi, dll)
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="khusus"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card card-primary card-yemi">
                    <div class="card-header">
                        <h3 class="card-title">CATATAN</h3>
                    </div>
                    <div class="card-body">
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="catatan"></textarea>
                    </div>
                </div>
                <button id="submit" class="btn btn-lg bg-gradient-success mb-5 float-right">SUBMIT</button>
                <!-- <button class="btn btn-lg bg-yemi mb-5 float-right">SUBMIT</button> -->
            </div>
        </div>
    </div>
</section>

<?php

?>

<!-- /.content -->
<?php $this->load->view('foot'); ?>
<script src="<?= base_url(); ?>assets/custom/signature_pad.min.js"></script>

<script>
    $datauser = [];
    $(document).ready(function() {
        $('.kode').select2({
            placeholder: "",
            allowClear: true
        });
        $('.select2-selection').css("height", "2.5rem")
        $('.select2-selection__arrow').css("height", "2.5rem")
        $('.select2-selection__rendered').css("line-height", "2.5rem")
        $('.select2-results__options').css("line-height", "2.5rem")
        $datauser = <?= json_encode($user); ?>
    });

    $('#select-nama').on('change', function() {
        nik = $('#select-nama').val()
        // console.log(nik)
        $.each($datauser, function(key, val) {
            if (nik === val.username) {
                $('#jabatan').val(val.jabatan)
                $('#dept').val(val.org_unit)
            }
        })
    })

    $('#select-nama').on('select2:clear', function(e) {
        // console.log('clear')
        $('#jabatan').val('')
        $('#dept').val('')
    });

    $('#submit').on('click', function() {
        datasubmit = {
            // data pemohon
            'pemohon': $('#select-nama').val(),
            'jenis_perekrutan': $('input[name="jenis_perekrutan"]:checked').val(),
            'job_order': $('input[name="job_order"]').val(),
            'tgl_in': $('input[name="tgl_in"]').val(),

            //data permintaan
            'status_karyawan': $('input[name="status_karyawan"]:checked').val(),
            'jabatan': $('input[name="jabatan"]').val(),
            'grade': $('input[name="grade"]').val(),

            'section': $('input[name="section"]').val(),
            'total_mp': $('input[name="total_mp"]').val(),
            'keterangan': $('input[name="keterangan"]').val(),

            //kualifikasi
            'personal': $('textarea[name="personal"]').val(),
            'kompetensi': $('textarea[name="kompetensi"]').val(),
            'khusus': $('textarea[name="khusus"]').val(),

            'catatan': $('textarea[name="catatan"]').val(),
        }

        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>recruitment/submit_request",
            data: {
                data: datasubmit
            },
            success: function(data) {
                toastr.success('Data berhasil disimpan')
                location.reload()
            }
        });

        console.log(datasubmit)
    })
</script>