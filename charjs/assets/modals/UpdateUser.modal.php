<!-- Modal -->
<div class="modal fade" id="updateUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" id="updateUserForm">
        <div class="modal-body">
            <input type="hidden" name="uid" id="uid" class="form-control">
            <label>Email Address</label>
            <input type="email" readonly="true" name="uemail" id="uemail" class="form-control" required>
            <label class="mt-3">Password</label>
            <input type="password" name="upassword" id="upassword" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Update User</button>
        </div>
      </form>
    </div>
  </div>
</div>