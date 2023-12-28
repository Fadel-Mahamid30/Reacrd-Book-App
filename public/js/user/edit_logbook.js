$(document).ready(function() {
  
    // remove logbook
    $("#add-input").click(function(){
        let input = $("#add_input").html();
        $("#put_inputs").before(input);
    });
  
    // remove logbook
    $('body').on('click', '.remove-new-input-logbook', function(){
  
      new swal({
        title: "Anda yakin?",
        text: "Anda yakin ingin menghapus inputan ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              $(this).parents(".logbook-list-input").remove()
              swal({
                icon: "success",
                title: "Success",
                text: "Input berhasil dihapus"
              })
          }else {
            swal("Input batal untuk di hapus.");
          }
      });
    
    });

    $('body').on('click', '.remove-input-logbook', function(){
        
        let parentElement = $(this).parents(".list-input-update");
        let update = parentElement.find(".update-logbook-id");
        let remove = parentElement.find(".remove-logbook-id");
        let input = parentElement.find(".input-element");

        new swal({
          title: "Anda yakin?",
          text: "Anda yakin ingin menghapus inputan ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                parentElement.addClass("hidden");
                update.remove();
                remove.prop("disabled", false);
                input.remove();

                swal({
                    icon: "success",
                    title: "Success",
                    text: "Input berhasil dihapus"
                })
            }else {
              swal("Input batal untuk di hapus.");
            }
        });
      
    });

});