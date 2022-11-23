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
                    <i class="bi bi-house-gear-fill me-2"></i>Home Section
                </div>
                <div class="card-body">
                    <button class="btn btn-secondary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modalHome"><i class="bi bi-plus-square-fill me-2"></i>Add New</button>
                    <div class="table-reponsive">
                        <table class="table table-hover table-bordered" width="100%" cellspacing="0" id="table_home">
                            <thead>
                                <tr>
                                    <th>Why Select Us</th>
                                    <th>Section 1</th>
                                    <th>Descriptions</th>
                                    <th>Section 2</th>
                                    <th>Descriptions</th>
                                    <th>Section 3</th>
                                    <th>Descriptions</th>
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
    <div class="modal fade" id="modalHome" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 style="color: #1e272e;"><i class="bi bi-house-gear-fill me-2"></i>Home Section</h5>
                    <hr>
                    <form id="addHome" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label>Why Select Us?</label>
                            <textarea name="why_select_us" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Section 1 Title</label>
                            <input type="text" class="form-control form-control-sm" name="section_one_title" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Section 1 Short Descriptions</label>
                            <textarea name="sec_one_desc" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Section 2 Title</label>
                            <input type="text" class="form-control form-control-sm" name="section_two_title" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Section 2 Short Descriptions</label>
                            <textarea name="sec_two_desc" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Section 3 Title</label>
                            <input type="text" class="form-control form-control-sm" name="section_three_title" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Section 2 Short Descriptions</label>
                            <textarea name="sec_three_desc" class="form-control" required></textarea>
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
    <div class="modal fade" id="modalEditHome" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 style="color: #1e272e;"><i class="fas fa-info-circle me-2"></i>Update About Us</h5>
                    <hr>
                    <form id="updateHome" enctype="multipart/form-data">
                        <input type="hidden" name="home_id" id="home_id">
                        <div class="form-group mb-3">
                            <label>Why Select Us?</label>
                            <textarea name="why_select_us" id="why_select_us" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Section 1 Title</label>
                            <input type="text" class="form-control form-control-sm" name="section_one_title" id="section_one_title" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Section 1 Short Descriptions</label>
                            <textarea name="sec_one_desc" id="sec_one_desc" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Section 2 Title</label>
                            <input type="text" class="form-control form-control-sm" name="section_two_title" id="section_two_title" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Section 2 Short Descriptions</label>
                            <textarea name="sec_two_desc" id="sec_two_desc" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Section 3 Title</label>
                            <input type="text" class="form-control form-control-sm" name="section_three_title" id="section_three_title" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Section 2 Short Descriptions</label>
                            <textarea name="sec_three_desc" id="sec_three_desc" class="form-control" required></textarea>
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