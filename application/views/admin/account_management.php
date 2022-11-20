<style>
    #table_account td:nth-child(1),
    #table_account td:nth-child(5) {
        text-align: center;
    }

    #table_permission td:nth-child(2) {
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
                    <i class="fas fa-user-friends me-2"></i>Account Managament
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9 mb-2">
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalAccount"><i class="bi bi-person-plus-fill me-2"></i>Add
                                Account</button>
                            <a href="<?= base_url('main/exportAccount')?>" class="btn btn-secondary btn-sm"><i class="bi bi-cloud-download-fill me-2"></i>Export Data</a>
                        </div>
                        <div class="col-md-3 text-end mb-2">
                            <div class="input-group input-group-sm mb-3">
                                <label class="input-group-text" for="filter_status">Status</label>
                                <select class="form-select form-select-sm" id="filter_status">
                                    <option value="">Select status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-reponsive">
                        <table class="table table-hover" width="100%" cellspacing="0" id="table_account">
                            <thead>
                                <tr>
                                    <th class="text-center">Action</th>
                                    <th>Username</th>
                                    <th>Fullname</th>
                                    <th>Date Created</th>
                                    <th class="text-center">Status</th>
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
    <div class="modal fade" id="modalAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 style="color: #1e272e;"><i class="bi bi-person-plus-fill me-2"></i>Add Account</h5>
                    <hr>
                    <form id="registerAccount">
                        <div class="form-group mb-3">
                            <label>Fullname</label>
                            <input type="text" class="form-control" name="fullname" autocomplete="off" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square-fill me-2"></i>Close</button>
                    <button type="submit" class="btn btn-outline-primary btn-sm"><i class="bi bi-save-fill me-2"></i>Save Account</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalPermission" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 style="color: #1e272e;"><i class="bi bi-person-plus-fill me-2"></i>Add Permissions</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0" id="table_permission">
                            <thead>
                                <tr>
                                    <th>Permission</th>
                                    <th class="text-center" width="15%">Access</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square-fill me-2"></i>Close</button>
                </div>
            </div>
        </div>
    </div>