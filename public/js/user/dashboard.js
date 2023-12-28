$(document).ready(function() {
    // Mengambil tanggal hari ini
    moment.locale('id');
    var today = moment();
    console.log(today.format("DD MMMM YYYY"));

    // Memperbarui tampilan setiap kali minggu berubah
    setInterval(function() {
      if (moment().week() !== today.week()) {
        today = moment();
        updateView();
      }
    }, 3600);

    // Fungsi untuk memperbarui tampilan
    function updateView() {
      // Menampilkan tanggal hari ini pada elemen dengan class "data-bulan-ini"
      $(".data-bulan-ini").text(today.format("MMMM, yyyy"));

      // Menampilkan 7 hari pertama pada bulan ini pada elemen dengan id "week-days"
      var hariAwalBulan  = moment().startOf("week");
      var hari = [];

      for (var i = 0; i < 7; i++) {
        hari.push(moment(hariAwalBulan).add(i, "days").format("dddd-DD"));
      }

      console.log(hari);

      hari.forEach( items => {
        $result = items.split("-");
        $nama_hari = $result[0];
        $tanggal = $result[1];
        $hari_ini = today.format("DD"); 

        if($hari_ini == $tanggal){
          $class = "border-2 border-blue-600 bg-blue-100 py-4 flex justify-center items-center flex-col";
        }else{
          $class = "border-2 border-gray-400 bg-gray-100 py-4 flex justify-center items-center flex-col";
        }

        $("#kalender-perminggu").append(
            `<div class="${$class}">
                <p class="text-sm mb-2 font-medium">${$nama_hari}</p>
                <p class="text-2xl font-bold">${$tanggal}</p>
            </div>`
        );

      });
    }

    updateView();

});