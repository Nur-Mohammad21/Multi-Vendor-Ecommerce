$(document).ready(function(){
    // Check Admin Password is Correct or not
    $("#current_password").keyup(function(){
        let current_password = $("#current_password").val();
        // alert(current_password);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admins/check-Admins-Password',
            data:{current_password:current_password},
            success:function(resp){
                // alert(resp);
                if(resp=="true")
                {
                    $("#check_password").html("<font color='green'>Current Password is Correct</font>")
                }
                else if(resp=="false")
                {
                    $("#check_password").html("<font color='red'>Current Password is Incorrect</font>")
                }

            },
            error:function () {
              console.log("error");
            }
        });
    })
    // update Admin Status
    $(document).on("click",".updateAdminStatus",function () {
       // alert("test");
        var status = $(this).children("i").attr("status");
        var admin_id = $(this).attr("admin_id");
        //alert(admin_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admins/update-admin-status',
            data:{status:status,admin_id:admin_id},
            success:function (resp) {
                if (resp['status']==0){
                    $("#admins-"+admin_id).html("<i  style='font-size:25px;' class= '2x mdi mdi-bookmark-outline' status='Inactive'></i>");
                }
                else if (resp['status']==1){
                    $("#admins-"+admin_id).html("<i  style='font-size:25px;' class= '2x mdi mdi-bookmark-check' status='Active'></i>");
                }
            },
            error:function () {
                console.log("Error");
            }
        })
    });
});
