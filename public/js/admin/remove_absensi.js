$(document).ready(function() {

    $.ajaxSetup({
        headers: {"X-CSRF-TOKEN" : $("meta[name='csrf-token']").attr("content")}
    });

    $('body').on('click', '.remove_absesni', function() {
        let remove_id = $(this).data('id');

        console.log(remove_id);

        // alert(post_id);
        new swal({
            title: "Anda yakin?",
            text: "Anda yakin ingin menghapus data ini?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            $.ajax({
                method: "DELETE",
                url: `/absensi/remove/${remove_id}`,
                success:function(response){ 

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
                    })
                },error:function(err){
                    swal({
                        icon: `error`,
                        title: `404 Not Found`,
                        text: `Terjadi kesalahan. harap coba lagi nanti!`,
                    });
                }
            })
            } else {
            swal("Data batal untuk di hapus.");
            }
        });
    });
});