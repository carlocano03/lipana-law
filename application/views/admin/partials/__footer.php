<footer class="py-3 text-white mt-auto" style="background: #fff;">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-secondary">Copyright &copy; Lawfirm Company 2022</div>
        </div>
    </div>
</footer>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalChangePass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="bi bi-person-lines-fill me-2"></i>Change Password</h5>
                <hr>
                <form id="changePassword">
                    <div class="form-group mb-3">
                        <div id="error-message"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="yourPassword">Password</label>
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-shield-lock-fill"></i></span>
                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="confirmPassword">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-shield-lock-fill"></i></span>
                            <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary" id="save_changes">Save Changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/js/scripts.js') ?>"></script>
<script src="<?= base_url('assets/js/date-time.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>