// update foto profil
$(document).ready(function() {
    $("#input-foto-profil").change(function() {
      var file = this.files[0];
      var update_foto = $("#input-foto-profil");
      if (file) {
        var format = file.name.split('.').pop().toLowerCase();
        if (format != "png" && format != "jpeg" && format != "jpg") {
            update_foto.val("");
            swal({
                title: "Warning!",
                text: "Format file tidak valid. Silakan upload file dengan format png, jpeg, atau jpg.",
                icon: "warning",
            });
            return false;
        }
        var reader = new FileReader();
        reader.onload = function(event) {
          $("#foto-profil").attr("src", event.target.result);
        };
        reader.readAsDataURL(file);
      }
    });

    console.log("tes");
});