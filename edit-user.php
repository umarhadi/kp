<?php
@ob_start();
session_start();

if (!empty($_SESSION['admin'])) {
    require 'config.php';
    include $view;

    include 'komponen/header.php';
} else {
    echo '<script>window.location="login.php";</script>';
}
?>

<title>Edit User - CV. Mahardika Komputer</title>
<div class="hk-pg-wrapper">
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <div class="hk-pg-header mb-1">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Edit Akun</h2>
            </div>
        </div>
        <div class="card hk-dash-type-1 overflow-hide">
            <div class="card-header pa-0">
                <div class="nav nav-tabs nav-light nav-justified" id="dash-tab" role="tablist">
                    <a class="d-flex align-items-center justify-content-center nav-item nav-link active" id="dash-tab-1" data-toggle="tab" href="#Foto" role="tab" aria-selected="true">
                        <div class="d-flex">
                            <div>
                                <span class="d-block mb-5"><span class="display-6"><i class="zmdi zmdi-image"></i> Edit Foto Profile</span></span>
                            </div>
                        </div>
                    </a>
                    <a class="d-flex align-items-center justify-content-center nav-item nav-link" id="dash-tab-2" data-toggle="tab" href="#Profile" role="tab" aria-selected="false">
                        <div class="d-flex">
                            <div>
                                <span class="d-block mb-5"><span class="display-6"><i class="zmdi zmdi-account"></i> Edit Profile</span></span>
                            </div>
                        </div>
                    </a>
                    <a class="d-flex align-items-center justify-content-center nav-item nav-link" id="dash-tab-2" data-toggle="tab" href="#Password" role="tab" aria-selected="false">
                        <div class="d-flex">
                            <div>
                                <span class="d-block mb-5"><span class="display-6"><i class="zmdi zmdi-key"></i> Edit Password</span></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="Foto" role="tabpanel" aria-labelledby="Foto">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mx-auto d-block">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <img class="img-fluid circle" src="assets/img/user/<?php echo $hasil_profil['gambar']; ?>" style="width:200px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="fungsi/edit/edit.php?gambar=user" enctype="multipart/form-data">
                                    <input type="file" accept="image/*" name="foto">
                                    <input type="hidden" value="<?php echo $hasil_profil['gambar']; ?>" name="foto2">
                                    <input type="hidden" name="id" value="<?php echo $hasil_profil['id_member']; ?>">
                                    <span class="pull-right">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="zmdi zmdi-upload"> Ganti Foto</i></button>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="Profile" role="tabpanel" aria-labelledby="Profile">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mx-auto d-block">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="tab-pane fade" id="Password" role="tabpanel" aria-labelledby="Password">
                ya
            </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script src="vendors/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Slimscroll JavaScript -->
<script src="dist/js/jquery.slimscroll.js"></script>

<!-- Fancy Dropdown JS -->
<script src="dist/js/dropdown-bootstrap-extended.js"></script>

<!-- FeatherIcons JavaScript -->
<script src="dist/js/feather.min.js"></script>

<!-- Toggles JavaScript -->
<script src="vendors/jquery-toggles/toggles.min.js"></script>
<script src="dist/js/toggle-data.js"></script>

<!-- Counter Animation JavaScript -->
<script src="vendors/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="vendors/jquery.counterup/jquery.counterup.min.js"></script>

<!-- Easy pie chart JS -->
<script src="vendors/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

<!-- Sparkline JavaScript -->
<script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="vendors/raphael/raphael.min.js"></script>
<script src="vendors/morris.js/morris.min.js"></script>

<!-- EChartJS JavaScript -->
<script src="vendors/echarts/dist/echarts-en.min.js"></script>

<!-- File upload -->
<script src="vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

<!-- Peity JavaScript -->
<script src="vendors/peity/jquery.peity.min.js"></script>

<!-- Data Table JavaScript -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="vendors/jszip/dist/jszip.min.js"></script>
<script src="vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="dist/js/dataTables-data.js"></script>

<!-- Init JavaScript -->
<script src="dist/js/init.js"></script>
<script src="dist/js/dashboard3-data.js"></script>
</body>