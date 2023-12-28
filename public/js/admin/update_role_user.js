$(document).ready(function() {
    
    $.ajaxSetup({
        headers: {"X-CSRF-TOKEN" : $("meta[name='csrf-token']").attr("content")}
    });

    $('body').on('click', '.update-role-user', function() {
        let user_id = $(this).data('id');

        // alert(post_id);
        new swal({
            title: "Anda yakin?",
            text: "Anda yakin ingin mengubah hak akses pada user ini?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "GET",
                    url: `/get/data/user/${user_id}`,
                    success:function(response){ 
        
                        if (response.status) {
                            
                            let roles = response.roles;
                            let user_role = response.user;

                            let selected = "";
                            let option = "";
                            roles.forEach(row => {
                                if (row["name"] == user_role) {
                                    selected = "selected";
                                }else{
                                    selected = "";
                                }

                                option += `<option ${selected} value="${row['name']}">${row['name']}</option>`
                            });

                            $("#id-hak-akses-user").val(user_id);
                            $("#hak-akses-user").html(option);
                            $("#modal-user-access").removeClass("hidden");

                            // console.log(user_role);
                            // console.log(option);

                        }else{
                            swal({
                                icon: `error`,
                                title: `404 Not Found`,
                                text: `Terjadi kesalahan. data tidak ditemukan!.`,
                            });
                        }
                        
                    },error:function(err){
                        console.log(err);
                        swal({
                            icon: `error`,
                            title: `404 Not Found`,
                            text: `Terjadi kesalahan. harap coba lagi nanti!`,
                        });
                    }
                });
            } else {
                swal("Hak akses batal diubah.");
            }
        });
    });

    $(".modal-user-access-close").click(function () { 
        $("#modal-user-access").addClass("hidden");
    });

    $("#button-update-hak-akses").click(function (){
        let parentElement = $("#input-role-user");
        let id_user = parentElement.find("#id-hak-akses-user").val();
        let hak_akses = parentElement.find("#hak-akses-user").val();
        
        $.ajax({
            method: "PUT",
            url: `/update/role/user/${id_user}`,
            data : {hak_akses : hak_akses},
            success:function(response){ 

                if (response.status) {
                    
                    //show response
                    swal({
                        type: `${response.type}`,
                        icon: `${response.icon}`,
                        title: `${response.title}`,
                        text: `${response.message}`,
                        showConfirmButton: false,
                        timer: 3000
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                location.reload();
                            } else {
                                location.reload();
                            }
                        });

                }else{
                    swal({
                        icon: `error`,
                        title: `404 Not Found`,
                        text: `Terjadi kesalahan. data tidak ditemukan!.`,
                    });
                }
                
            },error:function(err){
                console.log(err);
                swal({
                    icon: `error`,
                    title: `404 Not Found`,
                    text: `Terjadi kesalahan. harap coba lagi nanti!`,
                });
            }
        });
    });

});