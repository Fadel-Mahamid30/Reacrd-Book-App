$(document).ready(function () {
    
    $("body").on("click", ".active-user", function () {
        let user_id = $(this).data('id');

        new swal({
            title: "Anda yakin?",
            text: "Anda yakin ingin mengaktifkan akun ini?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "PUT",
                    url: `/active/user/${user_id}`,
                    success:function(response){ 
        
                        if (response.status) {

                            // console.log(response.message);
                    
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
            } else {
                swal("Akun batal di aktifkan.");
            }
        });
    })

});