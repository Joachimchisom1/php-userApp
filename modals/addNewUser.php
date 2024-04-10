<!-- Add New User Modal -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body px-4">
          <form method="POST" id="form-data">
            <div class="form-group">
              <input type="text" name="fname" class="form-control" placeholder="First Name" required>
            </div>
            <div class="form-group">
              <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="form-group">
              <input type="text" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
              <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
            </div>
            <div class="form-group">
              <input type="submit" name="insert" id="insert" value="Add User" class="btn btn-danger btn-block" >
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>