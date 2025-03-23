<?php $this->load->view('head'); ?>
<style>
    .signature-pad {
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 200px;
        height: 200px;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url(); ?>assets/dist/img/user1.png" alt="User profile picture">
                        </div>
                        <br>
                        <h6 class="text-center"><?= $this->session->fullname; ?></h6>

                        <p class="text-muted text-center"><?= $this->session->jabatan; ?></p>

                        <!-- <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="float-right">13,287</a>
                            </li>
                        </ul> -->

                        <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <!-- <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> -->
                            <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                            <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" placeholder="Name" value="<?= $this->session->fullname; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" placeholder="Name" value="<?= $this->session->username; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Akses</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" placeholder="Experience" readonly><?= $this->session->akses; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Signature</label>
                                        <div class="col-sm-10">
                                            <div class="wrapper">
                                                <?php if ($this->session->sign != '') { ?>
                                                    <div class="signature-pad">
                                                        <?= $this->session->sign; ?>
                                                    </div>
                                                <?php } else { ?>
                                                    <canvas id="signature-pad" class="signature-pad"> </canvas>
                                                <?php } ?>
                                            </div>
                                            <button type="button" class="btn btn-default btn-sm d-none" id="undo"><i class="fa fa-undo"></i> Undo</button>
                                            <?php if ($this->session->sign == '') { ?>
                                                <button type="button" class="btn btn-danger btn-sm" id="clear"><i class="fa fa-eraser"></i> Clear</button>
                                            <?php } else { ?>
                                                <a href="<?= base_url(); ?>login/remove_sign" class="btn btn-danger btn-sm" id="clear"><i class="fa fa-eraser"></i> Clear</a>
                                            <?php } ?>
                                            <button type="button" class="btn btn-primary btn-sm d-none" id="save-png">Save as PNG</button>
                                            <button type="button" class="btn btn-info btn-sm d-none" id="save-jpeg">Save as JPEG</button>
                                            <button type="button" class="btn btn-primary btn-sm" id="save-svg"><i class="fas fa-save"></i> Save</button>
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
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <!-- <div class="col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div> -->
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="password">
                                <!-- <form class="form-horizontal" action="#" method="POST"> -->
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Old Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="old_password" placeholder="Old Password" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="new_password" placeholder="New Password" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Confirm New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="new_password2" placeholder="New Password" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button id="change_password" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </div>
                                <!-- </form> -->
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?php $this->load->view('foot'); ?>
<script src="<?= base_url(); ?>assets/custom/signature_pad.min.js"></script>

<script>
    // let myurl = "<?php echo base_url(); ?>login/save_sign"
    var canvas = document.getElementById("signature-pad");

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
        // canvas.width = 200;
        // canvas.height = 200;
        canvas.getContext("2d").scale(ratio, ratio);
    }

    window.onresize = resizeCanvas;
    // console.log(canvas.width);
    // console.log(canvas.height);
    resizeCanvas();

    var signaturePad = new SignaturePad(canvas, {
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
                url: "<?php echo base_url(); ?>login/save_sign",
                data: {
                    svg: svg,
                    nik: "<?= $this->session->username; ?>"
                },
                success: function(data) {
                    location.reload()
                }
            });
            // $("#myModal")
            // 	.modal("show")
            // 	.find(".modal-body")
            // 	.text(atob(data.split(",")[1]))
            // 	.append('<h4><i>"Hanya copy kode di atas ke HTML Anda"</i></h4>');
        }
    });

    document.getElementById("clear").addEventListener("click", function() {
        signaturePad.clear();
    });

    $('#change_password').on('click', function() {
        old = $('input[name=old_password]').val()
        new1 = $('input[name=new_password]').val()
        new2 = $('input[name=new_password2]').val()

        real_password = '<?= $user->password; ?>'

        if (true) {
            if (new1 == new2) {
                $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>login/change_password",
                    data: {
                        nik: "<?= $this->session->username; ?>",
                        new_pass: new1
                    },
                    success: function(data) {
                        alert('Password  berhasil dirubah')
                        location.reload()
                    }
                });
            } else {
                alert('Password baru anda tidak sama')
            }
        } else {
            alert('Password lama anda salah')
        }

        console.log(old, new1, new2)
    })
</script>
<!-- <script src="<?= base_url(); ?>assets/custom/signature-pad.js"></script> -->