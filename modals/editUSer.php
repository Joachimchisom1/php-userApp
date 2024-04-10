<!-- Edit User Modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body px-4">
          <form method="POST" id="edit-form-data">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
              <input type="text" name="fname" class="form-control" id="fname" required>
            </div>
            <div class="form-group">
              <input type="text" name="lname" class="form-control" id="lname" required>
            </div>
            <div class="form-group">
              <input type="text" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
              <input type="text" name="phone" class="form-control" id="phone" required>
            </div>
            <div class="form-group">
              <input type="submit" name="update" id="update" value="Update User" class="btn btn-danger btn-block" >
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>