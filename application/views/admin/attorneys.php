<style>
    #table_attorneys th:nth-child(3),
    #table_attorneys td:nth-child(3) {
        max-width: 100px;
    }

    #table_attorneys td:nth-child(4) {
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
                    <i class="bi bi-list-columns-reverse me-2"></i>List of Attorneys
                </div>
                <div class="card-body">
                    <button class="btn btn-secondary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modalAttorney"><i class="bi bi-plus-square-fill me-2"></i>Add New</button>
                    <div class="table-reponsive">
                        <table class="table table-hover" width="100%" cellspacing="0" id="table_attorneys">
                            <thead>
                                <tr>
                                    <th>Attorney's Name</th>
                                    <th>Practice Areas</th>
                                    <th>Quotes</th>
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
    <div class="modal fade" id="modalAttorney" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 style="color: #1e272e;"><i class="bi bi-list-columns-reverse me-2"></i>Attorneys</h5>
                    <hr>
                    <form id="addAttorney" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label>Attorney's Name</label>
                            <input type="text" class="form-control" name="name" autocomplete="off" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Practice Areas</label>
                            <input type="text" class="form-control" name="practice_areas" autocomplete="off" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Short Quotes</label>
                            <textarea name="quotes" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Image <small class="text-danger">(Size: w-11.11/inches x h-13.29/inches)</small></label>
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

    <!-- Modal -->
    <div class="modal fade" id="modalEditAttorney" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 style="color: #1e272e;"><i class="bi bi-list-columns-reverse me-2"></i>Services</h5>
                    <hr>
                    <form id="updateAttorney" enctype="multipart/form-data">
                        <input type="hidden" name="attorney_id" id="attorney_id">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="update_attroney" id="update_attroney" aria-label="Floating label select example" required>
                                <option value="">Select update transaction</option>
                                <option value="1">Edit Details Only</option>
                                <option value="2">Edit Details and Re-upload image</option>
                            </select>
                            <label for="floatingSelect">Update Functions</label>
                        </div>
                        <div class="form-group mb-3">
                            <label>Attorney's Name</label>
                            <input type="text" class="form-control" name="name" id="name" autocomplete="off" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Practice Areas</label>
                            <input type="text" class="form-control" name="practice_areas" id="practice_areas" autocomplete="off" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Short Quotes</label>
                            <textarea name="quotes" class="form-control" id="quotes" required></textarea>
                        </div>
                        <div class="form-group mb-3" id="update_attorneyImg">
                            <label>Image <small class="text-danger">(Size: w-11.11/inches x h-13.29/inches)</small></label>
                            <input type="file" name="inpFile" class="form-control" accept="image/*">
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