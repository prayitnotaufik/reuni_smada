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

    .modal-xxl {
        max-width: 90%;
    }
</style>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 p-2">
            <div class="col-sm-6">
                <h1 class="m-0">VACANCY LIST</h1>
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
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Kehadiran</h3>
                    </div>
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
                                        <th width="1%">tiket</th>
                                        <th width="1%">#</th>
                                        <th>Section</th>
                                        <th>Jabatan</th>
                                        <!-- <th>Bagian</th> -->
                                        <th>Grade</th>
                                        <th>Status Karyawan</th>
                                        <th>Jumlah MP</th>
                                        <th>Due Date</th>
                                        <th width="10%">Action</th>
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

<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> -->
            <div class="modal-body">
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
                                                        <input type="radio" name="status_karyawan" id="radioSuccess3" value="tetap/percobaan">
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
                        <button id="submit" class="btn btn-lg bg-gradient-success mb-5 float-right">SAVE</button>
                        <!-- <button class="btn btn-lg bg-yemi mb-5 float-right">SUBMIT</button> -->
                    </div>
                </div>
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

    dtIn = $("#tbMain").DataTable({
        // pageLength: '25',
        "paging": true,
        columnDefs: [{
            target: 0,
            visible: false,
        }, ],
        // "responsive": true,
        ajax: {
            url: '<?= base_url() ?>' + 'recruitment/dt_request',
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

    // $("#tbMain").on('click', '#detail', function() {
    //     var currentRow = $(this).closest("tr");
    //     var index = currentRow.index()
    //     var id = dtIn.row(index).data()[0]
    //     console.log(id)
    // })

    dtIn.on('click', '#detail, #edit, #delete', function(e) {
        let data = dtIn.row(e.target.closest('tr')).data();
        tiket = data[0]
        action = this.id

        if (action === 'detail') {
            console.log('detail')
        } else if (action === 'edit') {
            $('#jabatan').val('')
            $('#dept').val('')
            $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>recruitment/get_request",
                data: {
                    data: {
                        'tiket': tiket,
                    }
                },
                success: function(data) {
                    hasil = JSON.parse(data)
                    console.log(hasil)

                    // data pemohon
                    $('#select-nama').val(hasil.pemohon)
                    $('#select-nama').trigger('change')
                    $("input[name='jenis_perekrutan'][value='" + hasil.jenis_perekrutan + "']").prop('checked', true)
                    $('input[name="job_order"]').val(hasil.job_order)
                    $('input[name="tgl_in"]').val(hasil.tgl_in)

                    //data permintaan
                    $("input[name='status_karyawan'][value='" + hasil.status_karyawan + "']").prop('checked', true)
                    $('input[name="jabatan"]').val(hasil.jabatan)
                    $('input[name="grade"]').val(hasil.grade)

                    $('input[name="section"]').val(hasil.section)
                    $('input[name="total_mp"]').val(hasil.total_mp)
                    $('input[name="keterangan"]').val(hasil.keterangan)

                    //kualifikasi
                    $('textarea[name="personal"]').val(hasil.personal)
                    $('textarea[name="kompetensi"]').val(hasil.kompetensi)
                    $('textarea[name="khusus"]').val(hasil.khusus)

                    $('textarea[name="catatan"]').val(hasil.catatan)
                    // toastr.success('Data berhasil dihapus')
                    // reload_dt()
                }
            });

            $('#modal-default').modal('toggle');
            $('#modal-default').on('shown.bs.modal', function() {
                // $('#customer').focus()
            })

        } else if (action === 'delete') {
            if (confirm('Apakah anda yakin?')) {
                $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>recruitment/delete_request",
                    data: {
                        data: {
                            'tiket': tiket,
                        }
                    },
                    success: function(data) {
                        console.log(data)
                        toastr.success('Data berhasil dihapus')
                        reload_dt()
                    }
                });
            }
        }
        // alert(data[0]);
    })

    function reload_dt() {
        dtIn.ajax.reload(null, true);
        // console.log($('#period').val())
    }
</script>