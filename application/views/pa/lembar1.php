<?php $this->load->view('head'); ?>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"> -->
<script>
    // $(function() {
    //     $('body').addClass('sidebar-collapse')
    //     $('.content-header').addClass('d-none')
    //     // $('#about').addClass('expand');
    // });
    document.body.classList.add('sidebar-collapse')
</script>

<style>
    /**
  Default Markup
**/

    /* body {
        background: #F0E5E1;
    } */

    /* .container {
        max-width: 900px;
        margin: 0 auto;
    } */


    /**
  Component
**/

    /* label {
        width: 100%;
    } */

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
</style>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 kepala p-2">
            <div class="col-sm-6">
                <h1 class="m-0">LEMBAR EVALUASI</h1>
                <!-- <?= var_dump($nilai); ?> -->
                <p class="m-0">Golongan Khusus – Produksi untuk Grade E1 ~ E4</p>
            </div><!-- /.col -->
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
                    <!-- <div class="card-header">
                        <h3 class="card-title">Identitas</h3>
                    </div> -->
                    <div class="card-body">
                        <!-- <div class="row">
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
                        </div> -->
                        <div class="row">

                            <input type="hidden" name="section" id="section" value="<?= $karyawan->cost_center_name; ?>">
                            <div class="col-5">
                                <label for="exampleInputEmail1">NAMA</label>
                                <input id="nama" type="text" class="form-control" value="<?= $karyawan->nama; ?>" readonly>
                            </div>
                            <div class="col-2">
                                <label for="exampleInputEmail1">NIK</label>
                                <input id="nik" type="text" class="form-control" value="<?= $karyawan->nik; ?>" readonly>
                            </div>
                            <div class="col-1">
                                <label for="exampleInputEmail1">GRADE</label>
                                <input id="grade" type="text" class="form-control" value="<?= $karyawan->grade; ?>" readonly>
                            </div>
                            <div class="col-4">
                                <label for="exampleInputEmail1">BAGIAN</label>
                                <input id="bagian" type="text" class="form-control" value="<?= $karyawan->cost_center_name; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <!-- <div class="card-header">
                        <h3 class="card-title">Skala Penilaian</h3>
                    </div> -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <label for="exampleInputEmail1">SKALA PENILAIAN(n>0)</label>
                            </div>
                            <div class="col-2">
                                <label for="exampleInputEmail1">5n : Excellent</label>
                            </div>
                            <div class="col-2">
                                <label for="exampleInputEmail1">4n : Bagus</label>
                            </div>
                            <div class="col-2">
                                <label for="exampleInputEmail1">3n : Biasa</label>
                            </div>
                            <div class="col-2">
                                <label for="exampleInputEmail1">2n : Sedikit Kurang</label>
                            </div>
                            <div class="col-2">
                                <label for="exampleInputEmail1">1n : Kurang</label>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">1.Prestasi</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th colspan="2">Kategori</th>
                                    <th>1n</th>
                                    <th>2n</th>
                                    <th>3n</th>
                                    <th>4n</th>
                                    <th>5n</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 5%">1.</td>
                                    <td style="width: 50%">
                                        <b>Kuantitas Pekerjaan</b><br>
                                        Target tercapai sesuai rencana pekerjaan.
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi1" class="card-input-element" value="4" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">4</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi1" class="card-input-element" value="8" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">8</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi1" class="card-input-element" value="12" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">12</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi1" class="card-input-element" value="16" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">16</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi1" class="card-input-element" value="20" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">20</div>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">2.</td>
                                    <td style="width: 50%">
                                        <b>Kualitas Pekerjaan</b><br>
                                        Memiliki kemampuan untuk menghasilkan produk atau hasil pekerjaan yang akurat dan berkualitas.
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi2" class="card-input-element" value="4" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">4</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi2" class="card-input-element" value="8" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">8</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi2" class="card-input-element" value="12" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">12</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi2" class="card-input-element" value="16" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">16</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi2" class="card-input-element" value="20" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">20</div>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">3.</td>
                                    <td style="width: 50%">
                                        <b>Kaizen</b><br>
                                        Menghasilkan atau membuat perbaikan ditempat kerja atau di dalam pekerjaan
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi3" class="card-input-element" value="1" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">1</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi3" class="card-input-element" value="2" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">2</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi3" class="card-input-element" value="3" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">3</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi3" class="card-input-element" value="4" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">4</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi3" class="card-input-element" value="5" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">5</div>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">4.</td>
                                    <td style="width: 50%">
                                        <b>Safety & 5S</b><br>
                                        Menerapkan secara konsisten aturan safety, IK, dan K3 dalam tim dan konsisten melakukan 5S di tempat kerja
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi4" id="prestasi4" class="card-input-element" value="2" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">2</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi4" id="prestasi4" class="card-input-element" value="4" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">4</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi4" id="prestasi4" class="card-input-element" value="6" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">6</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi4" id="prestasi4" class="card-input-element" value="8" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">8</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="prestasi4" id="prestasi4" class="card-input-element" value="10" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">10</div>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 55%">
                                        <span class="float-right">Total/ 55 Poin</span>
                                    </td>
                                    <td colspan="5">
                                        <span id="final_prestasi"><?= intval(array_sum(explode(',', $nilai->prestasi)) / 55 * 100) . '%'; ?></span>
                                        <button type="button" class="btn btn-primary btn-sm float-right" id="save_prestasi"><i class="fas fa-save"></i> Save</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">2.Kemampuan Melaksanakan Pekerjaan</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th colspan="2">Kategori</th>
                                    <th>1n</th>
                                    <th>2n</th>
                                    <th>3n</th>
                                    <th>4n</th>
                                    <th>5n</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 5%">1.</td>
                                    <td style="width: 50%">
                                        <b>Skill dan Pengetahuan Pekerjaan</b><br>
                                        Memiliki pengetahuan dan skill tinggi dalam pekerjaannya
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan1" class="card-input-element" value="1" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">1</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan1" class="card-input-element" value="2" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">2</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan1" class="card-input-element" value="3" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">3</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan1" class="card-input-element" value="4" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">4</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan1" class="card-input-element" value="5" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">5</div>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">2.</td>
                                    <td style="width: 50%">
                                        <b>Rentang pekerjaan</b><br>
                                        Memiliki pengetahuan dan skill berbagai bidang pekerjaan
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan2" class="card-input-element" value="1" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">1</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan2" class="card-input-element" value="2" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">2</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan2" class="card-input-element" value="3" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">3</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan2" class="card-input-element" value="4" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">4</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan2" class="card-input-element" value="5" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">5</div>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">3.</td>
                                    <td style="width: 50%">
                                        <b>Kemampuan Memahami</b><br>
                                        Memiliki kemampuan untuk memahami dan melaksanakan perintah atasan dengan cepat.
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan3" class="card-input-element" value="1" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">1</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan3" class="card-input-element" value="2" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">2</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan3" class="card-input-element" value="3" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">3</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan3" class="card-input-element" value="4" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">4</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan3" class="card-input-element" value="5" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">5</div>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">4.</td>
                                    <td style="width: 50%">
                                        <b>Kemampuan Analisa dan membuat keputusan</b><br>
                                        Memiliki kemampuan menganalisa permasalahan dengan baik dan dapat membuat keputusan secara tepat.
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan4" class="card-input-element" value="1" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">1</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan4" class="card-input-element" value="2" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">2</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan4" class="card-input-element" value="3" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">3</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan4" class="card-input-element" value="4" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">4</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan4" class="card-input-element" value="5" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">5</div>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">5.</td>
                                    <td style="width: 50%">
                                        <b>Leadership</b><br>
                                        Memiliki kemampuan mendayagunakan anggotanya untuk meningkatkan efesiensi dan mencapai tujuan kelompok
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan5" class="card-input-element" value="1" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">1</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan5" class="card-input-element" value="2" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">2</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan5" class="card-input-element" value="3" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">3</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan5" class="card-input-element" value="4" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">4</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="kemampuan5" class="card-input-element" value="5" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">5</div>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 55%">
                                        <span class="float-right">Total/25 Poin</span>
                                    </td>
                                    <td colspan="5">
                                        <span id="final_kemampuan"><?= intval(array_sum(explode(',', $nilai->kemampuan)) / 25 * 100) . '%'; ?></span>
                                        <button type="button" class="btn btn-primary btn-sm float-right" id="save_kemampuan"><i class="fas fa-save"></i> Save</button>
                                        <!-- <input type="number" class="form-control" placeholder=""> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">3.Sikap Kerja</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th colspan="2">Kategori</th>
                                    <th>1n</th>
                                    <th>2n</th>
                                    <th>3n</th>
                                    <th>4n</th>
                                    <th>5n</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 5%">1.</td>
                                    <td style="width: 50%">
                                        <b>Kedisiplinan</b><br>
                                        Senantiasa mematuhi peraturan perusahaan, aturan tempat kerja, dan perintah atasan.
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap1" class="card-input-element" value="1" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">1</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap1" class="card-input-element" value="2" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">2</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap1" class="card-input-element" value="3" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">3</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap1" class="card-input-element" value="4" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">4</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap1" class="card-input-element" value="5" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">5</div>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">2.</td>
                                    <td style="width: 50%">
                                        <b>Semangat Kerjasama</b><br>
                                        Senantiasa bekerjasama dan memiliki kemampuan berkomunikasi yang baik dengan atasan, rekan kerja, bawahan, dan pelanggan serta melakukan horenso.
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap2" class="card-input-element" value="1" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">1</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap2" class="card-input-element" value="2" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">2</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap2" class="card-input-element" value="3" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">3</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap2" class="card-input-element" value="4" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">4</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap2" class="card-input-element" value="5" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">5</div>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">3.</td>
                                    <td style="width: 50%">
                                        <b> Rasa Tanggung Jawab</b><br>
                                        Memahami tugas dan wewenang dalam pekerjaannya dan menyelesaikan pekerjaannya dengan penuh tanggung jawab.
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap3" class="card-input-element" value="1" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">1</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap3" class="card-input-element" value="2" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">2</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap3" class="card-input-element" value="3" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">3</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap3" class="card-input-element" value="4" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">4</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap3" class="card-input-element" value="5" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">5</div>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">4.</td>
                                    <td style="width: 50%">
                                        <b>Proaktif</b><br>
                                        Senantiasa bersemangat dalam menyelesaikan pekerjaan dan bersikap proaktif untuk menyelesaikan pekerjaan yang sulit atau baru.
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap4" class="card-input-element" value="1" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">1</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap4" class="card-input-element" value="2" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">2</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap4" class="card-input-element" value="3" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">3</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap4" class="card-input-element" value="4" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">4</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="sikap4" class="card-input-element" value="5" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">5</div>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 55%">
                                        <span class="float-right">Total/20 Poin</span>
                                    </td>
                                    <td colspan="5">
                                        <span id="final_sikap"><?= intval(array_sum(explode(',', $nilai->sikap)) / 20 * 100) . '%'; ?></span>
                                        <button type="button" class="btn btn-primary btn-sm float-right" id="save_sikap"><i class="fas fa-save"></i> Save</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">4. RASIO KEHADIRAN PADA PERIODE PENILAIAN (Dikurangi Sakit, Ijin, Alpha, Terlambat dan Pulang Cepat)</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-bordered ">
                            <!-- <thead>
                                <tr>
                                    <th rowspan="2"><b>Kondisi Kehadiran Kerja</b></th>
                                    <th>Hari Hadir Kerja</th>
                                    <th>Jumlah Hari Aktual</th>
                                    <th>Rasio Kehadiran</th>
                                </tr>
                            </thead> -->
                            <tbody>
                                <tr>
                                    <td rowspan="2" style="vertical-align : middle; text-align:center"><b class="">Kondisi Kehadiran Kerja</b></td>
                                    <td>Hari Hadir Kerja</td>
                                    <td>Jumlah Hari Aktual</td>
                                    <td>Rasio Kehadiran</td>
                                </tr>
                                <tr>
                                    <td style="padding: 0.75rem;">
                                        <input type="text" class="form-control" placeholder="" value="<?= $nilai->hadir; ?>" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="" value="<?= $nilai->hari; ?>" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="" value="<?= number_format(($nilai->rasio * 100)) . '%'; ?>" readonly>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <!-- <div class="card-header">
                        <h3 class="card-title">4. RASIO KEHADIRAN PADA PERIODE PENILAIAN (Dikurangi Sakit, Ijin, Alpha, Terlambat dan Pulang Cepat)</h3>
                    </div> -->
                    <div class="card-body p-0">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 55%;">
                                        <b>Evaluasi Pertama</b>
                                    </th>
                                    <th class="text-center"><b>Parameter</b></th>
                                    <th class="text-center">
                                        Komentar Pengevaluasi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="evaluasi1" class="card-input-element" value="S" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">S</div>
                                            </div>
                                        </label>
                                        <label>
                                            <input type="radio" name="evaluasi1" class="card-input-element" value="A" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">A</div>
                                            </div>
                                        </label>
                                        <label>
                                            <input type="radio" name="evaluasi1" class="card-input-element" value="B" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">B</div>
                                            </div>
                                        </label>
                                        <label>
                                            <input type="radio" name="evaluasi1" class="card-input-element" value="C" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">C</div>
                                            </div>
                                        </label>
                                        <label>
                                            <input type="radio" name="evaluasi1" class="card-input-element" value="D" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">D</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td>
                                        <!-- <label for="exampleInputEmail1">Parameter</label> -->
                                        <input type="text" class="form-control" placeholder="" value="<?= $nilai->parameter1; ?>" readonly>
                                    </td>
                                    <!-- <td>
                                        <label for="exampleInputEmail1">Peringkat Ke</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </td> -->
                                    <td style="width: 30%;">
                                        <!-- <label for="exampleInputEmail1">Komentar Pengevaluasi</label> -->
                                        <textarea id="komentar" class="form-control" rows="4"><?= $nilai->komentar; ?></textarea>
                                        <button type="button" class="btn btn-primary btn-sm float-right mt-1 toastrDefaultSuccess" id="save_komen"><i class="fas fa-save"></i> Save</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <!-- <div class="card-header">
                        <h3 class="card-title">4. RASIO KEHADIRAN PADA PERIODE PENILAIAN (Dikurangi Sakit, Ijin, Alpha, Terlambat dan Pulang Cepat)</h3>
                    </div> -->
                    <div class="card-body p-0">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 55%;"><b>Evaluasi Kedua</b></th>
                                    <th class="text-center"><b>Parameter</b></th>
                                    <!-- <th>Komentar Pengevaluasi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="evaluasi2" class="card-input-element" value="S" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">S</div>
                                            </div>
                                        </label>
                                        <label>
                                            <input type="radio" name="evaluasi2" class="card-input-element" value="A" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">A</div>
                                            </div>
                                        </label>
                                        <label>
                                            <input type="radio" name="evaluasi2" class="card-input-element" value="B" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">B</div>
                                            </div>
                                        </label>
                                        <label>
                                            <input type="radio" name="evaluasi2" class="card-input-element" value="C" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">C</div>
                                            </div>
                                        </label>
                                        <label>
                                            <input type="radio" name="evaluasi2" class="card-input-element" value="D" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">D</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td>
                                        <!-- <label for="exampleInputEmail1">Parameter</label> -->
                                        <input type="text" class="form-control" placeholder="" value="<?= $nilai->parameter2; ?>" readonly>
                                    </td>
                                    <td style="width: 30%;">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <!-- <div class="card-header">
                        <h3 class="card-title">4. RASIO KEHADIRAN PADA PERIODE PENILAIAN (Dikurangi Sakit, Ijin, Alpha, Terlambat dan Pulang Cepat)</h3>
                    </div> -->
                    <div class="card-body p-0">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 55%;"><b>Evaluasi Terakhir</b></th>
                                    <th class="text-center"><b>Parameter</b></th>
                                    <!-- <th>Komentar Pengevaluasi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <label>
                                            <input type="radio" name="evaluasi3" class="card-input-element" value="S" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">S</div>
                                            </div>
                                        </label>
                                        <label>
                                            <input type="radio" name="evaluasi3" class="card-input-element" value="A" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">A</div>
                                            </div>
                                        </label>
                                        <label>
                                            <input type="radio" name="evaluasi3" class="card-input-element" value="B" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">B</div>
                                            </div>
                                        </label>
                                        <label>
                                            <input type="radio" name="evaluasi3" class="card-input-element" value="C" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">C</div>
                                            </div>
                                        </label>
                                        <label>
                                            <input type="radio" name="evaluasi3" class="card-input-element" value="D" />
                                            <div class="card card-default card-input">
                                                <div class="card-header">D</div>
                                            </div>
                                        </label>
                                    </td>
                                    <td>
                                        <!-- <label for="exampleInputEmail1">Parameter</label> -->
                                        <input type="text" class="form-control" placeholder="" value="<?= $nilai->parameter3; ?>" readonly>
                                    </td>
                                    <!-- <td>
                                        <label for="exampleInputEmail1">Peringkat Ke</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </td> -->
                                    <td style="width: 30%;">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Item Penilaian</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-bordered " style="height: 280px;">
                            <tbody>
                                <tr>
                                    <td style="width: 70%;">1. Prestasi</td>
                                    <td>
                                        <?= intval(array_sum(explode(',', $nilai->prestasi)) / 55 * 100) . '%'; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2. Kemampuan melaksanakan pekerjaan</td>
                                    <td>
                                        <?= intval(array_sum(explode(',', $nilai->kemampuan)) / 25 * 100) . '%'; ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>3. Sikap Kerja</td>
                                    <td>
                                        <?= intval(array_sum(explode(',', $nilai->sikap)) / 20 * 100) . '%'; ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>4. Rasio Kehadiran Kerja</td>
                                    <td>
                                        <?= number_format(($nilai->rasio * 100)) . '%'; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Digital Sign</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-bordered " style="height: 280px;">
                            <tbody>
                                <tr>
                                    <td style="width: 25%;height:12px">
                                        <div class="row">
                                            Penilai Pertama
                                        </div>
                                        <!-- <button id="save1" class="btn btn-primary float-right">
                                            <i class="fas fa-save"></i> Save
                                        </button> -->
                                        <div class="row">
                                            <button id="btn-sign1" class="btn btn-sm btn-success float-right"><i class="fas fa-file-signature"></i></button>
                                            &nbsp
                                            <a href="<?= base_url(); ?>penilaian/remove_sign1/<?= $karyawan->nik; ?>" class="btn btn-danger btn-sm float-right"><i class="fa fa-eraser"></i></a>
                                        </div>
                                    </td>
                                    <td style="width: 25%;">
                                        <div class="row">
                                            Penilai Kedua
                                        </div>
                                        <!-- <button id="save1" class="btn btn-primary float-right">
                                            <i class="fas fa-save"></i> Save
                                        </button> -->
                                        <div class="row">
                                            <?php if ($nilai->penilai2 == '') { ?>
                                                <button type="button" class="btn btn-danger btn-sm float-right" id="clear2"><i class="fa fa-eraser"></i></button>
                                                <button type="button" class="btn btn-primary btn-sm float-right" id="save-svg2"><i class="fas fa-save"></i> </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-danger btn-sm float-right d-none" id="clear2"><i class="fa fa-eraser"></i></button>
                                                <button type="button" class="btn btn-primary btn-sm float-right d-none" id="save-svg2"><i class="fas fa-save"></i> </button>
                                                <a href="<?= base_url(); ?>penilaian/remove_sign2/<?= $karyawan->nik; ?>" class="btn btn-danger btn-sm float-right"><i class="fa fa-eraser"></i></a>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td style="width: 25%;">
                                        <div class="row">
                                            Penilai Ketiga
                                        </div>
                                        <!-- <button id="save1" class="btn btn-primary float-right">
                                            <i class="fas fa-save"></i> Save
                                        </button> -->
                                        <div class="row">
                                            <?php if ($nilai->penilai3 == '') { ?>
                                                <button type="button" class="btn btn-danger btn-sm float-right" id="clear3"><i class="fa fa-eraser"></i></button>
                                                <button type="button" class="btn btn-primary btn-sm float-right" id="save-svg3"><i class="fas fa-save"></i> </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-danger btn-sm float-right d-none" id="clear3"><i class="fa fa-eraser"></i></button>
                                                <button type="button" class="btn btn-primary btn-sm float-right d-none" id="save-svg3"><i class="fas fa-save"></i> </button>
                                                <a href="<?= base_url(); ?>penilaian/remove_sign3/<?= $karyawan->nik; ?>" class="btn btn-danger btn-sm float-right"><i class="fa fa-eraser"></i></a>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td style="width: 25%;">
                                        <div class="row">
                                            Karyawan
                                        </div>
                                        <div class="row">
                                            <?php if ($nilai->karyawan == '') { ?>
                                                <button type="button" class="btn btn-danger btn-sm float-right" id="clear"><i class="fa fa-eraser"></i></button>
                                                <button type="button" class="btn btn-primary btn-sm float-right" id="save-svg"><i class="fas fa-save"></i> </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-danger btn-sm float-right d-none" id="clear"><i class="fa fa-eraser"></i></button>
                                                <button type="button" class="btn btn-primary btn-sm float-right d-none" id="save-svg"><i class="fas fa-save"></i> </button>
                                                <a href="<?= base_url(); ?>penilaian/remove_sign/<?= $karyawan->nik; ?>" class="btn btn-danger btn-sm float-right"><i class="fa fa-eraser"></i></a>
                                            <?php } ?>
                                        </div>
                                        <!-- <button id="save1" class="btn btn-primary float-right">
                                            <i class="fas fa-save"></i> Save
                                        </button> -->
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <!-- <img src="<?= base_url(); ?>assets/img/stamp3.png" alt="" width="175"> -->
                                        <?php if ($penilai1 != '') { ?>
                                            <div id="my-sign1x" class="">
                                                <?= $penilai1->signature; ?>
                                                <br>
                                                <p style="font-size: large;">
                                                    <?= $penilai1->fullname; ?>
                                                </p>
                                            </div>
                                        <?php } ?>
                                        <div id="my-sign1" class="d-none">
                                            <?= $this->session->sign; ?>
                                            <br>
                                            <p style="font-size: large;">
                                                <?= $this->session->fullname; ?>
                                            </p>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <!-- <button id="btn-sign2" class="btn btn-success text-center">Click to Sign</button> -->
                                        <?php if ($nilai->penilai2 == '') { ?>
                                            <canvas id="signature-pad2" class="signature-pad"> </canvas>
                                        <?php } else { ?>
                                            <?= $nilai->penilai2; ?>
                                            <canvas id="signature-pad2" class="signature-pad d-none"> </canvas>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <!-- <button id="btn-sign3" class="btn btn-success text-center">Click to Sign</button> -->
                                        <?php if ($nilai->penilai3 == '') { ?>
                                            <canvas id="signature-pad3" class="signature-pad"> </canvas>
                                        <?php } else { ?>
                                            <?= $nilai->penilai3; ?>
                                            <canvas id="signature-pad3" class="signature-pad d-none"> </canvas>

                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($nilai->karyawan == '') { ?>
                                            <canvas id="signature-pad" class="signature-pad"> </canvas>
                                        <?php } else { ?>
                                            <?= $nilai->karyawan; ?>
                                            <canvas id="signature-pad" class="signature-pad d-none"> </canvas>
                                            <p style="font-size: large;">
                                                <?= $karyawan->nama; ?>
                                            </p>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Modal untuk tampil preview tanda tangan-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Preview Tanda Tangan</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Submit</button>
            </div>
        </div>
    </div>
</div>
<?php
$prestasi = explode(',', $nilai->prestasi);
$kemampuan = explode(',', $nilai->kemampuan);
$sikap = explode(',', $nilai->sikap);

// var_dump($prestasi);
// $total_prestasi = array_sum()
?>

<!-- /.content -->
<?php $this->load->view('foot'); ?>
<script src="<?= base_url(); ?>assets/custom/signature_pad.min.js"></script>

<script>
    // $('.toastrDefaultSuccess').click(function() {
    // });
    $('#save_komen').on('click', function() {
        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>penilaian/save_komen",
            data: {
                nik: "<?= $karyawan->nik; ?>",
                komentar: $('#komentar').val(),
            },
            success: function(data) {
                toastr.success('Komentar evaluasi berhasil disimpan')
                // location.reload()
            }
        });
    })
    $('#btn-sign1').on('click', function() {
        // $('svg').css('width', '80%')
        $('#my-sign1').removeClass('d-none')
        $('#my-sign1x').addClass('d-none')
        // $(this).addClass('d-none')
        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>penilaian/sign_penilai1",
            data: {
                nik: "<?= $karyawan->nik; ?>"
            },
            success: function(data) {
                // location.reload()
            }
        });
    })
    $('#btn-sign2').on('click', function() {

        $('#my-sign2').removeClass('d-none')
        $('#my-sign2x').addClass('d-none')

        // $(this).addClass('d-none')
        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>penilaian/sign_penilai2",
            data: {
                nik: "<?= $karyawan->nik; ?>"
            },
            success: function(data) {
                // location.reload()
            }
        });
    })
    $('#btn-sign3').on('click', function() {
        $('#my-sign3').removeClass('d-none')
        $('#my-sign3x').addClass('d-none')

        // $(this).addClass('d-none')
        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>penilaian/sign_penilai3",
            data: {
                nik: "<?= $karyawan->nik; ?>"
            },
            success: function(data) {
                // location.reload()
            }
        });
    })

    $('#save_prestasi').on('click', function() {
        prestasi = []
        prestasi.push(
            $("input[name=prestasi1]:checked").val(),
            $("input[name=prestasi2]:checked").val(),
            $("input[name=prestasi3]:checked").val(),
            $("input[name=prestasi4]:checked").val(),
            // $("input[name=prestasi4]").val(),
        )
        // console.log(prestasi)
        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>penilaian/save_prestasi",
            data: {
                'prestasi': prestasi,
                'nik': "<?= $karyawan->nik; ?>",
            },
            success: function(data) {
                toastr.success('Penilaian prestasi berhasil disimpan')
                location.reload()

            }
        });
    })

    $('#save_kemampuan').on('click', function() {
        kemampuan = []
        kemampuan.push(
            $("input[name=kemampuan1]:checked").val(),
            $("input[name=kemampuan2]:checked").val(),
            $("input[name=kemampuan3]:checked").val(),
            $("input[name=kemampuan4]:checked").val(),
            $("input[name=kemampuan5]:checked").val(),
            // $("input[name=kemampuan4]").val(),
        )
        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>penilaian/save_kemampuan",
            data: {
                'kemampuan': kemampuan,
                'nik': "<?= $karyawan->nik; ?>",
            },
            success: function(data) {
                toastr.success('Penilaian kemampuan berhasil disimpan')
                location.reload()
            }
        });
    })
    $('#save_sikap').on('click', function() {
        sikap = []
        sikap.push(
            $("input[name=sikap1]:checked").val(),
            $("input[name=sikap2]:checked").val(),
            $("input[name=sikap3]:checked").val(),
            $("input[name=sikap4]:checked").val(),
            // $("input[name=sikap4]").val(),
        )
        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>penilaian/save_sikap",
            data: {
                'sikap': sikap,
                'nik': "<?= $karyawan->nik; ?>",
            },
            success: function(data) {
                toastr.success('Penilaian sikap berhasil disimpan')
                location.reload()

            }
        });
    })

    $(document).ready(function() {
        $eval1 = '<?= $this->encryption->decrypt($nilai->eval1); ?>';
        $eval2 = '<?= $this->encryption->decrypt($nilai->eval2); ?>';
        $eval3 = '<?= $this->encryption->decrypt($nilai->eval3); ?>';
        ($eval1 == '' ? '' : $("input[name=evaluasi1][value=" + $eval1 + "]").prop('checked', true));
        ($eval2 == '' ? '' : $("input[name=evaluasi2][value=" + $eval2 + "]").prop('checked', true));
        ($eval3 == '' ? '' : $("input[name=evaluasi3][value=" + $eval3 + "]").prop('checked', true));

        $prestasi1 = '<?= isset($prestasi[0]) ? $prestasi[0] : 0 ?>';
        $prestasi2 = '<?= isset($prestasi[1]) ? $prestasi[1] : 0 ?>';
        $prestasi3 = '<?= isset($prestasi[2]) ? $prestasi[2] : 0 ?>';
        $prestasi4 = '<?= isset($prestasi[3]) ? $prestasi[3] : 0 ?>';
        ($prestasi1 == '' ? '' : $("input[name=prestasi1][value=" + $prestasi1 + "]").prop('checked', true));
        ($prestasi2 == '' ? '' : $("input[name=prestasi2][value=" + $prestasi2 + "]").prop('checked', true));
        ($prestasi3 == '' ? '' : $("input[name=prestasi3][value=" + $prestasi3 + "]").prop('checked', true));
        ($prestasi4 == '' ? '' : $("input[name=prestasi4][value=" + $prestasi4 + "]").prop('checked', true));

        $kemampuan1 = '<?= isset($kemampuan[0]) ? $kemampuan[0] : 0 ?>';
        $kemampuan2 = '<?= isset($kemampuan[1]) ? $kemampuan[1] : 0 ?>';
        $kemampuan3 = '<?= isset($kemampuan[2]) ? $kemampuan[2] : 0 ?>';
        $kemampuan4 = '<?= isset($kemampuan[3]) ? $kemampuan[3] : 0 ?>';
        $kemampuan5 = '<?= isset($kemampuan[4]) ? $kemampuan[4] : 0 ?>';
        ($kemampuan1 == '' ? '' : $("input[name=kemampuan1][value=" + $kemampuan1 + "]").prop('checked', true));
        ($kemampuan2 == '' ? '' : $("input[name=kemampuan2][value=" + $kemampuan2 + "]").prop('checked', true));
        ($kemampuan3 == '' ? '' : $("input[name=kemampuan3][value=" + $kemampuan3 + "]").prop('checked', true));
        ($kemampuan4 == '' ? '' : $("input[name=kemampuan4][value=" + $kemampuan4 + "]").prop('checked', true));
        ($kemampuan5 == '' ? '' : $("input[name=kemampuan5][value=" + $kemampuan5 + "]").prop('checked', true));

        $sikap1 = '<?= isset($sikap[0]) ? $sikap[0] : 0 ?>';
        $sikap2 = '<?= isset($sikap[1]) ? $sikap[1] : 0 ?>';
        $sikap3 = '<?= isset($sikap[2]) ? $sikap[2] : 0 ?>';
        $sikap4 = '<?= isset($sikap[3]) ? $sikap[3] : 0 ?>';
        ($sikap1 == '' ? '' : $("input[name=sikap1][value=" + $sikap1 + "]").prop('checked', true));
        ($sikap2 == '' ? '' : $("input[name=sikap2][value=" + $sikap2 + "]").prop('checked', true));
        ($sikap3 == '' ? '' : $("input[name=sikap3][value=" + $sikap3 + "]").prop('checked', true));
        ($sikap4 == '' ? '' : $("input[name=sikap4][value=" + $sikap4 + "]").prop('checked', true));
    })


    // DIGITAL SIGN
    var canvas = document.getElementById("signature-pad");
    var canvas2 = document.getElementById("signature-pad2");
    var canvas3 = document.getElementById("signature-pad3");

    // Adjust canvas coordinate space taking into account pixel ratio,
    // to make it look crisp on mobile devices.
    // This also causes canvas to be cleared.
    function resizeCanvas() {
        // When zoomed out to less than 100%, for some very strange reason,
        // some browsers report devicePixelRatio as less than 1
        // and only part of the canvas is cleared then.
        var ratio = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;

        canvas2.width = canvas2.offsetWidth * ratio;
        canvas2.height = canvas2.offsetHeight * ratio;

        canvas3.width = canvas3.offsetWidth * ratio;
        canvas3.height = canvas3.offsetHeight * ratio;
        // canvas.width = 200;
        // canvas.height = 200;
        canvas.getContext("2d").scale(ratio, ratio);
        canvas2.getContext("2d").scale(ratio, ratio);
        canvas3.getContext("2d").scale(ratio, ratio);
    }

    window.onresize = resizeCanvas;
    // console.log(canvas.width);
    // console.log(canvas.height);
    resizeCanvas();

    var signaturePad = new SignaturePad(canvas, {
        backgroundColor: "rgb(255, 255, 255)", // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
    });
    var signaturePad2 = new SignaturePad(canvas2, {
        backgroundColor: "rgb(255, 255, 255)", // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
    });
    var signaturePad3 = new SignaturePad(canvas3, {
        backgroundColor: "rgb(255, 255, 255)", // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
    });

    document.getElementById("save-svg").addEventListener("click", function() {
        if (signaturePad.isEmpty()) {
            alert("Tanda Tangan Anda Kosong! Silahkan tanda tangan terlebih dahulu.");
        } else {
            var data = signaturePad.toDataURL("image/svg+xml");
            console.log(atob(data.split(",")[1]));
            svg = atob(data.split(",")[1]);
            $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>penilaian/save_sign",
                data: {
                    svg: svg,
                    nik: "<?= $karyawan->nik; ?>"
                },
                success: function(data) {
                    location.reload()
                }
            });
        }
    });

    document.getElementById("save-svg2").addEventListener("click", function() {
        if (signaturePad2.isEmpty()) {
            alert("Tanda Tangan Anda Kosong! Silahkan tanda tangan terlebih dahulu.");
        } else {
            var data = signaturePad2.toDataURL("image/svg+xml");
            console.log(atob(data.split(",")[1]));
            svg = atob(data.split(",")[1]);
            $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>penilaian/save_sign2",
                data: {
                    svg: svg,
                    nik: "<?= $karyawan->nik; ?>"
                },
                success: function(data) {
                    location.reload()
                }
            });
        }
    });

    document.getElementById("save-svg3").addEventListener("click", function() {
        if (signaturePad3.isEmpty()) {
            alert("Tanda Tangan Anda Kosong! Silahkan tanda tangan terlebih dahulu.");
        } else {
            var data = signaturePad3.toDataURL("image/svg+xml");
            console.log(atob(data.split(",")[1]));
            svg = atob(data.split(",")[1]);
            $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>penilaian/save_sign3",
                data: {
                    svg: svg,
                    nik: "<?= $karyawan->nik; ?>"
                },
                success: function(data) {
                    location.reload()
                }
            });
        }
    });

    document.getElementById("clear").addEventListener("click", function() {
        signaturePad.clear();
    });
    document.getElementById("clear2").addEventListener("click", function() {
        signaturePad2.clear();
    });
    document.getElementById("clear3").addEventListener("click", function() {
        signaturePad3.clear();
    });
</script>