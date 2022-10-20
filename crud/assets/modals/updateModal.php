<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body">
        <form method="post" id="updateForm" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="uid" id="uid" required>
          <input type="hidden" class="form-control" name="uoldimage" id="uoldimage" required>
          <label>Full Name<span class="text-danger"> * </span></label>
          <input type="text" class="form-control" name="ufull_name" id="ufull_name" required>
          <label class="mt-2">Email Address <span class="text-danger"> * </span> </label>
          <input type="email" class="form-control" name="uemail" id="uemail" required>
          <label class="mt-2">Password<span class="text-danger"> * </span></label>
          <input type="text" class="form-control" name="upassword" id="upassword" required>
          <label class="mt-2">Upload Image</label>
          <input type="file" class="form-control" name="unewimage" id="unewimage" >
          
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="updateDataBtn" class="btn btn-warning">Update Data</button>
        </div>
      </form>
    </div>
  </div>
</div>