<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body">
        <form method="post" id="updateForm">
          <label>Full Name</label>
          <input type="text" class="form-control" name="ufull_name" id="ufull_name" required>
          <label class="mt-2">Email Address</label>
          <input type="email" class="form-control" name="uemail" id="uemail" required>
          <label class="mt-2">Password</label>
          <input type="text" class="form-control" name="upassword" id="upassword" required>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="updateDataBtn" class="btn btn-warning">Update Data</button>
        </div>
      </form>
    </div>
  </div>
</div>