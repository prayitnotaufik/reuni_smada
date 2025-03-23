<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ayo Ngoding - Membuat Signature Pad jQuery</title>
    <!-- CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"> -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!-- <script src="<?= base_url(); ?>assets/custom/jQuery-3.6.0/jQuery-3.6.0.min.js"></script> -->
    <!-- <script src="<?= base_url(); ?>assets/custom/DataTables-1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/custom/DataTables-1.12.1/js/dataTables.bootstrap5.min.js"></script> -->

    <style type="text/css">
        .signature-pad {
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            height: 260px;
        }
    </style>
</head>

<body>
    <div class="container">
        <br>
        <h2>Membuat Signature Pad jQuery - www.ayongoding.com</h2>
        <div class="row">
            <div class="col-md-6">
                <hr>
                <h4>Signature Pad</h4>
                <div class="text-right">
                    <button type="button" class="btn btn-default btn-sm" id="undo"><i class="fa fa-undo"></i> Undo</button>
                    <button type="button" class="btn btn-danger btn-sm" id="clear"><i class="fa fa-eraser"></i> Clear</button>
                </div>
                <br>
                <form method="POST" action="<?php echo base_url() ?>login/save_sign">
                    <div class="wrapper">
                        <canvas id="signature-pad" class="signature-pad"></canvas>
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" id="save-png">Save as PNG</button>
                    <button type="button" class="btn btn-info btn-sm" id="save-jpeg">Save as JPEG</button>
                    <button type="button" class="btn btn-default btn-sm" id="save-svg">Save as SVG</button>
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
                </form>
            </div>
            <div class="col-md-6">
                <hr>
                <h4>Signature Pad</h4>
                <div class="text-right">
                    <button type="button" class="btn btn-default btn-sm" id="undo"><i class="fa fa-undo"></i> Undo</button>
                    <button type="button" class="btn btn-danger btn-sm" id="clear"><i class="fa fa-eraser"></i> Clear</button>
                </div>
                <br>
                <form method="POST" action="<?php echo base_url() ?>login/save_sign">
                    <div class="wrapper">
                        <canvas id="signature-pad" class="signature-pad"></canvas>
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" id="save-png">Save as PNG</button>
                    <button type="button" class="btn btn-info btn-sm" id="save-jpeg">Save as JPEG</button>
                    <button type="button" class="btn btn-default btn-sm" id="save-svg">Save as SVG</button>
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
                </form>
            </div>
            <div class="col-md-6">
                <hr>
                <h4>Signature Pad</h4>
                <div class="text-right">
                    <button type="button" class="btn btn-default btn-sm" id="undo"><i class="fa fa-undo"></i> Undo</button>
                    <button type="button" class="btn btn-danger btn-sm" id="clear"><i class="fa fa-eraser"></i> Clear</button>
                </div>
                <br>
                <form method="POST" action="<?php echo base_url() ?>login/save_sign">
                    <div class="wrapper">
                        <canvas id="signature-pad" class="signature-pad"></canvas>
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" id="save-png">Save as PNG</button>
                    <button type="button" class="btn btn-info btn-sm" id="save-jpeg">Save as JPEG</button>
                    <button type="button" class="btn btn-default btn-sm" id="save-svg">Save as SVG</button>
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
                </form>
            </div>
        </div>
    </div>
    <!-- Javascript -->
    <?php $this->load->view('foot'); ?>

    <script src="<?= base_url(); ?>assets/custom/signature_pad.min.js"></script>
    <script src="<?= base_url(); ?>assets/custom/signature-pad.js"></script>
</body>

</html>