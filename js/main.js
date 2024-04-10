

$(document).ready(function () {
    showAllUsers();
    function showAllUsers() {
        $.ajax({
            url: "include/action.php",
            type: "POST",
            data: { action: "view" },
            success: function (response) {
                // console.log(response);
                $("#showUser").html(response);
                $("table").DataTable({
                    order: [0, 'desc']
                });
            }
        })
    }

    // Add user request
    $("#insert").click(function (e) {
        if ($("#form-data")[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                url: "include/action.php",
                type: "POST",
                data: $("#form-data").serialize()+"&action=insert",
                success: function(response) {
                    Swal.fire({
                        title: 'User added successfully!',
                        type: 'success'
                    })
                    $("#addModal").modal('hide');
                    $("#form-data")[0].reset();
                    showAllUsers();
                }
            })
        }
    })

    // Show Edit User Request
    $("body").on("click", '.editBtn', function(e) {
        e.preventDefault();
        userId = $(this).attr('id')
        $.ajax({
            url: "include/action.php",
            type: "POST",
            data: {userId:userId},
            success: function(response){
                data = JSON.parse(response);
                $("#id").val(data.id)
                $("#fname").val(data.first_name)
                $("#lname").val(data.last_name)
                $("#email").val(data.email)
                $("#phone").val(data.phone)
            }
        })
    })


    // Edit user request
    $("#update").click(function (e) {
        if ($("#edit-form-data")[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                url: "include/action.php",
                type: "POST",
                data: $("#edit-form-data").serialize()+"&action=update",
                success: function(response) {
                    Swal.fire({
                        title: 'User Updated successfully!',
                        type: 'success'
                    })
                    $("#editModal").modal('hide');
                    $("#edit-form-data")[0].reset();
                    showAllUsers();
                }
            })
        }
    })

    // Delete user request
    $("body").on("click", ".deleteBtn", function(e){
        e.preventDefault();
        let tr = $(this).closest('tr');
        del_id = $(this).attr('id')
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: "include/action.php",
                type: "POST",
                data: {del_id:del_id},
                success:function(response){
                    tr.css('backgroud-color', '#ff6666')
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                      });
                      showAllUsers();
                    
                }
              })
            }
          });
    })

    // view User
    $("body").on("click", ".infoBtn", function(e){
        e.preventDefault()
        info_id = $(this).attr('id')
        $.ajax({
            url: "include/action.php",
            type: "POST",
            data: {info_id:info_id},
            success: function(response){
                data = JSON.parse(response)
               Swal.fire({
                title: '<strong>User Info : ID('+data.id+')</strong>',
                type: 'info',
                html: "<b>First Name: </b>"+data.first_name+"<br><b>Last Name: </b>"+data.last_name+"<br><b>Email: </b>"+data.email+"<br><b>Phone: </b>"+data.phone+""
               })
            }
        })
    })

})