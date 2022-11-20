<style>
    #table_about {
        text-align: justify;
    }

    .short {
        white-space: nowrap;
        width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><span id="date"></span></li>
                <li class="breadcrumb-item"><span id="clock"></span></li>
            </ol>

            <div class="card">
                <div class="card-header" style="background:#2d3436; color: #fff;">
                    <i class="fas fa-info-circle me-2"></i>About Us
                </div>
                <div class="card-body">
                    <button class="btn btn-secondary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modalAbout"><i class="bi bi-plus-square-fill me-2"></i>Add New</button>
                    <div class="table-reponsive">
                        <table class="table table-hover table-bordered" width="100%" cellspacing="0" id="table_about">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>About</th>
                                    <th>Mission</th>
                                    <th>Vision</th>
                                    <th>Values</th>
                                    <th>Video</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="modalAbout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 style="color: #1e272e;"><i class="fas fa-info-circle me-2"></i>About Us</h5>
                    <hr>
                    <form id="addAbout" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" autocomplete="off" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>About Us Descriptions</label>
                            <textarea name="about_us" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Our Mission</label>
                            <textarea name="mission" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Our Vision</label>
                            <textarea name="vision" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Our Values</label>
                            <textarea name="values" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Corporate Video</label>
                            <input type="file" name="inpFile" class="form-control" accept="video/*" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square-fill me-2"></i>Close</button>
                    <button type="submit" class="btn btn-outline-primary btn-sm"><i class="bi bi-save-fill me-2"></i>Save Changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>