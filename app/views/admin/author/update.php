<!doctype html>
<html lang="en">

<head>
    <?php include_once("app/views/admin/partical/head.php"); ?>
    <title>Cập nhật tác giả</title>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <?php include_once("app/views/admin/partical/sidebar.php"); ?>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <?php include_once("app/views/admin/partical/header.php"); ?>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Cập nhật tác giả</h5>
                            <div class="card">
                                <div class="card-body">
                                    <?php 
                                    if (isset($_SESSION['errorMessage']) && !empty($_SESSION['errorMessage'])) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $_SESSION['errorMessage']; ?>
                                        </div>
                                        <?php unset($_SESSION['errorMessage']); ?>
                                    <?php endif; ?>
                                    <form method="post" action="/admin/saveupdateauthor/<?php echo $author['id']; ?>">
                                        <div class="mb-3">
                                            <label class="form-label">Tên tác giả</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên tác giả" value="<?php echo $author['name']; ?>">
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="/admin/author" class="btn btn-dark m-1">Trở về</a>
                                            <button type="submit" class="btn btn-primary m-1">Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/public/libs/jquery/dist/jquery.min.js"></script>
    <script src="/public/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/public/js/sidebarmenu.js"></script>
    <script src="/public/js/app.min.js"></script>
    <script src="/public/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>