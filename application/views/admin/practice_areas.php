<style>
    #table_area {
        text-align: justify;
    }

    #table_area :nth-child(4) {
        text-align: center;
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
                    <i class="bi bi-archive-fill me-2"></i>Practice Areas
                </div>
                <div class="card-body">
                    <button class="btn btn-secondary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modalPracticeArea"><i class="bi bi-plus-square-fill me-2"></i>Add New</button>
                    <div class="table-reponsive">
                        <table class="table table-hover" width="100%" cellspacing="0" id="table_area">
                            <thead>
                                <tr>
                                    <th>Practice Area</th>
                                    <th>Short Descriptions</th>
                                    <th>Image</th>
                                    <th class="text-center">Action</th>
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
    <div class="modal fade" id="modalPracticeArea" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 style="color: #1e272e;"><i class="bi bi-list-columns-reverse me-2"></i>Services</h5>
                    <hr>
                    <form id="addPracticeArea" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label>Practice Area</label>
                            <input type="text" class="form-control" name="title" autocomplete="off" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Short Descriptions</label>
                            <textarea name="short_desc" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Image</label>
                            <input type="file" name="inpFile" class="form-control" accept="image/*" required>
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