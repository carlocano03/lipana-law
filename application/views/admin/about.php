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
                                    <th>Year</th>
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
                            <label>Year</label>
                            <input type="number" class="form-control" name="year" autocomplete="off" required>
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
                            <input type="file" name="inpFile" class="form-control" accept="video/*">
                        </div>
                        <div class="form-group mb-3">
                            <label>About Image <small class="text-danger">(Size: w-20.83inches x h-17.54)</small></label>
                            <input type="file" name="about_image" class="form-control" accept="image/*" required>
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

    <!-- Modal -->
    <div class="modal fade" id="modalEditAbout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 style="color: #1e272e;"><i class="fas fa-info-circle me-2"></i>Update About Us</h5>
                    <hr>
                    <form id="updateAbout" enctype="multipart/form-data">
                        <input type="hidden" name="about_id" id="about_id">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="update_trans" id="update_trans" aria-label="Floating label select example" required>
                                <option value="">Select update transaction</option>
                                <option value="1">Edit Details Only</option>
                                <option value="2">Edit Details & Re-upload video and image</option>
                            </select>
                            <label for="floatingSelect">Update Functions</label>
                        </div>
                        <div class="form-group mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control" id="title" name="title" autocomplete="off">
                        </div>
                        <div class="form-group mb-3">
                            <label>Year</label>
                            <input type="number" class="form-control" name="year" id="year" autocomplete="off" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>About Us Descriptions</label>
                            <textarea name="about_us" id="about_us" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Our Mission</label>
                            <textarea name="mission" id="mission" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Our Vision</label>
                            <textarea name="vision" id="vision" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Our Values</label>
                            <textarea name="values" id="values" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-3" id="update_video">
                            <label>Corporate Video</label>
                            <input type="file" name="inpFile" id="inpFile" class="form-control" accept="video/*">
                        </div>
                        <div class="form-group mb-3" id="update_image">
                            <label>About Image <small class="text-danger">(Size: w-20.83inches x h-17.54)</small></label>
                            <input type="file" name="about_image" id="about_image" class="form-control" accept="image/*" required>
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