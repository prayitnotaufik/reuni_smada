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

    .modal-backdrop {
        width: 100%;
        height: 100%;
    }
</style>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 kepala p-2">
            <div class="col-sm-6">
                <h1 class="m-0">HAK AKSES</h1>
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
                        <h3 class="card-title">Data Penilai</h3>
                    </div>
                    <div class="card-body">
                        <table id="tbMain" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Akses</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Akses</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIK</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jabatan</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Pilihan akses</label>
                        <select class="select2" multiple="multiple" data-placeholder="Pilih Akses" style="width: 100%;">
                            <option>Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</section>
<!-- /.content -->

<?php $this->load->view('foot'); ?>
<script>
    dtIn = $("#tbMain").DataTable({
        pageLength: '25',
        ajax: {
            url: '<?= base_url() ?>' + 'akses/dt_user',
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

    $('#tbMain').on('click', 'td button[id="btn-edit"]', function() {
        $('#modal-default').modal('toggle');
        $('#modal-default').on('shown.bs.modal', function() {
            // $('#customer').focus()
        })
        // nik = dtMain.row($(this).parents('tr')).data()[1]
        // kode = dtMain.row($(this).parents('tr')).data()[2]
        // nama = dtMain.row($(this).parents('tr')).data()[3]
        // detail = dtMain.row($(this).parents('tr')).data()[4]
        // wi_sop = dtMain.row($(this).parents('tr')).data()[5]
        // post_testq = dtMain.row($(this).parents('tr')).data()[6]

        // console.log(kode)
        // $('input[name="edit-dept"]').val(dept)
        // $('input[name="edit-kode"]').val(kode)
        // $('input[name="edit-nama"]').val(nama)
        // $('textarea[name="edit-detail"]').val(detail)
        // $('#modal-edit').modal('toggle');
        // $('#modal-edit').on('shown.bs.modal', function() {
        //     // $('#customer').focus()
        // })

    })

    $(document).ready(function() {
        $(".select2").select2({
            dropdownParent: $("#modal-default")
        });
    });
</script>