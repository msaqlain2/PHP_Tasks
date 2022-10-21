<!-- Modal -->
<div class="modal fade" id="addNewUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" id="addNewUserForm">
        <div class="modal-body">
            <label>Email Address</label>
            <input type="email" name="email" id="email" class="form-control" required>
            <label class="mt-3">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        <div class="error text-center mt-1 text-danger"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add New</button>
        </div>
      </form>
    </div>
  </div>
</div>