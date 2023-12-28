$(document).ready(function() {
  
  $.ajaxSetup({
      headers: {"X-CSRF-TOKEN" : $("meta[name='csrf-token']").attr("content")}
  });

  // modal absensi
  $(".detail-absensi").click(function () {
    let data_id = $(this).data('id');
    let body = $("#section-absensi");
    let terlambat = "";

    $.ajax({
      url : `/absensi/detail`,
      type : "GET",
      data : {data_id : data_id},
      success: function(response) {
          
        if (response.status) {

          let row = response.detail_absen;
          
          let jam_masuk = "-";
          let jam_keluar = "-";

          if(row.jam_masuk){
            jam_masuk = row.jam_masuk.slice(0, -3);
          }

          if(row.jam_keluar){
            jam_keluar = row.jam_keluar.slice(0, -3);
          }

          let terlambat = row.terlambat + " mnt";
          let tanggal = "Tanggal : " + moment(row.tanggal).format("DD MMM YYYY");

          if (parseInt(row.terlambat) == 0) {
            $("#parent-terlambat").addClass("bg-green-100 text-green-500")
            $("#parent-terlambat").removeClass("bg-red-100 text-red-600")
          }else {
            $("#parent-terlambat").addClass("bg-red-100 text-red-600")
            $("#parent-terlambat").removeClass("bg-green-100 text-green-500")
          }
          
          $("#modal-tanggal").text(tanggal);
          $("#modal-status").text(row.status_absensi);
          $("#modal-tmp-kerja").text(row.tempat_kerja);
          $("#modal-shift").text(row.shift_id);
          $("#modal-jam-masuk").text(jam_masuk);
          $("#modal-jam-keluar").text(jam_keluar);
          $("#modal-terlambat").text(terlambat);

          $("#modal-absensi").removeClass("hidden");
		  console.log(row.latitude);
		  console.log(row.longitude);
          viewMap(row.latitude, row.longitude);

        }else{
            swal({
                icon: `error`,
                title: `404 Not Found`,
                text: `Terjadi kesalahan. data tidak ditemukan!.`,
            });
        }
      },
      error:function(err){
        swal({
            icon: `error`,
            title: `404 Not Found`,
            text: `Terjadi kesalahan. harap coba lagi nanti!`,
        });
      }
    });
  });

  $(".modal-absensi-close").click(function () { 
      $("#modal-absensi").addClass("hidden");
  });

  var maps = {};
  function viewMap(latitude, longitude){
    
      let id_map = 'view-map';

      if (maps[id_map]) {
          maps[id_map].remove();
          delete maps[id_map];
      }

      var map = L.map(id_map);
      var marker;

      maps[id_map] = map;

      map.setView([latitude, longitude], 13);

      L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
          maxZoom: 20,
          subdomains:['mt0','mt1','mt2','mt3']
      }).addTo(map);

      marker = L.marker([latitude, longitude]).addTo(map);

      map.invalidateSize();
  }

});