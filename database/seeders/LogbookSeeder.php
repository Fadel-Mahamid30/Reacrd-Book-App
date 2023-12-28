<?php

namespace Database\Seeders;

use App\Models\Logbook_notes;
use App\Models\Tanggal_pembuatan_logbook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class LogbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            "user01@gmail.com",
            "user02@gmail.com",
            "user03@gmail.com",
            "user04@gmail.com",
            "user05@gmail.com",
            "user06@gmail.com",
            "user07@gmail.com",
        ];

        

        foreach($user as $row){
            $user_logbook = User::where("email", $row)->first();

            $tanggal = [
                ["tanggal_dibuat" => Carbon::parse("01-07-2023"),"user_id" => $user_logbook->id],
                ["tanggal_dibuat" => Carbon::parse("02-07-2023"),"user_id" => $user_logbook->id],
                ["tanggal_dibuat" => Carbon::parse("03-07-2023"),"user_id" => $user_logbook->id],
                ["tanggal_dibuat" => Carbon::parse("04-07-2023"),"user_id" => $user_logbook->id],
                ["tanggal_dibuat" => Carbon::parse("05-07-2023"),"user_id" => $user_logbook->id],
                ["tanggal_dibuat" => Carbon::parse("06-07-2023"),"user_id" => $user_logbook->id],
                ["tanggal_dibuat" => Carbon::parse("07-07-2023"),"user_id" => $user_logbook->id]
            ];

            Tanggal_pembuatan_logbook::insert($tanggal);
        }

        $notes = [
            // sdm it
            [
                "item_kerja" => "Membuat desain grafis untuk banner promosi.",
                "deskripsi" => "Membuat desain grafis menarik dan kreatif untuk banner promosi di berbagai platform digital, sehingga dapat menarik minat calon siswa untuk mendaftar di bimbel dan les privat."
            ],
            [
                "item_kerja" => "Merancang poster promosi untuk acara les privat.",
                "deskripsi" => "Merancang poster promosi yang menarik dan informatif untuk acara les privat tertentu, dengan mempertimbangkan target audiens dan tujuan pemasaran."
            ],
            [
                "item_kerja" => "Mengelola akun media sosial perusahaan.",
                "deskripsi" => "Mengelola akun media sosial perusahaan, seperti Instagram, dengan membuat postingan kreatif dan informatif tentang kegiatan bimbel dan les privat, serta memastikan keterlibatan pengguna dan pertumbuhan jumlah pengikut."
            ],
            [
                "item_kerja" => "Melakukan analisis kata kunci untuk strategi SEO website.",
                "deskripsi" => "Melakukan penelitian kata kunci yang relevan dengan les privat dan bimbel, serta menerapkan strategi SEO yang efektif untuk meningkatkan peringkat website perusahaan di mesin pencari."
            ],
            [
                "item_kerja" => "Mengoptimalkan konten website untuk meningkatkan visibilitas.",
                "deskripsi" => "Mengoptimalkan konten website dengan menggunakan teknik SEO on-page, seperti mengoptimalkan judul halaman, meta deskripsi, dan struktur URL, guna meningkatkan visibilitas dan peringkat website di mesin pencari."
            ],
            [
                "item_kerja" => "Membuat laman web baru untuk produk les privat.",
                "deskripsi" => "Membuat laman web yang menarik dan informatif tentang berbagai program les privat yang ditawarkan, termasuk deskripsi program, jadwal, biaya, dan testimoni siswa."
            ],
            [
                "item_kerja" => "Mengelola dan memperbarui konten produk di website.",
                "deskripsi" => "Mengelola dan memperbarui konten produk les privat di website, seperti mengubah informasi program, menambahkan artikel pendidikan terkait, dan mengganti gambar atau video yang relevan."
            ],
            [
                "item_kerja" => "Membuat konten visual untuk media sosial.",
                "deskripsi" => "Membuat konten visual menarik, seperti gambar dan video pendek, untuk diposting di media sosial perusahaan, dengan tujuan untuk meningkatkan keterlibatan pengguna dan memperluas jangkauan konten."
            ],
            [
                "item_kerja" => "Melakukan riset kompetitor.",
                "deskripsi" => "Melakukan riset tentang kompetitor di industri bimbel dan les privat, termasuk analisis kekuatan, kelemahan, dan strategi pemasaran mereka, untuk mendapatkan wawasan dan ide-ide baru dalam meningkatkan keunggulan perusahaan."
            ],
            [
                "item_kerja" => "Mengelola kampanye iklan online.",
                "deskripsi" => "Merencanakan, mengimplementasikan, dan mengelola kampanye iklan online menggunakan platform periklanan seperti Google Ads atau Facebook Ads. Mengidentifikasi target audiens yang tepat, membuat iklan yang menarik, mengatur anggaran iklan, dan melakukan pemantauan serta optimisasi berkelanjutan untuk mencapai tujuan pemasaran."
            ],
            [
                "item_kerja" => "Menganalisis data pemasaran digital.",
                "deskripsi" => "Mengumpulkan dan menganalisis data pemasaran digital, seperti lalu lintas website, konversi, dan metrik kinerja kampanye iklan. Menerjemahkan data tersebut menjadi wawasan yang dapat digunakan untuk meningkatkan efektivitas strategi pemasaran dan pengambilan keputusan yang lebih baik."
            ],
            [
                "item_kerja" => "Menyusun strategi pemasaran konten.",
                "deskripsi" => "Merencanakan dan menyusun strategi pemasaran konten untuk meningkatkan kesadaran merek dan minat calon siswa. Membuat konten yang relevan dan menarik, seperti artikel blog, infografis, dan video pendidikan, serta mempromosikannya melalui berbagai saluran digital."
            ],
            [
                "item_kerja" => "Melakukan pemeliharaan dan pembaruan website.",
                "deskripsi" => "Memastikan website perusahaan selalu berfungsi dengan baik dan diperbarui secara berkala. Melakukan pemeliharaan rutin, termasuk memperbaiki bug, mengoptimalkan kecepatan loading, dan memperbarui plugin atau tema. Memastikan tampilan website tetap menarik dan sesuai dengan perubahan tren desain."
            ],
            [
                "item_kerja" => "Membantu pengembangan produk dan layanan baru.",
                "deskripsi" => "Berkolaborasi dengan tim pengembangan produk dan manajemen untuk memberikan masukan tentang kebutuhan dan preferensi pasar dalam hal bimbel dan les privat. Memberikan kontribusi ide dan saran untuk pengembangan program baru, metode pembelajaran inovatif, dan peningkatan kualitas layanan yang ditawarkan."
            ],

            // akademik 
            [
                "item_kerja" => "Mencari dan merekrut guru bimbel atau les privat.",
                "deskripsi" => "Melakukan pencarian dan seleksi guru yang berkualifikasi untuk mengajar di bimbel atau les privat perusahaan. Meninjau latar belakang pendidikan, pengalaman, dan kemampuan mengajar calon guru untuk memastikan kualitas pengajaran yang baik."
            ],
            [
                "item_kerja" => "Mengatur dan menyusun jadwal bimbel atau les privat.",
                "deskripsi" => "Mengelola jadwal pengajaran dengan mengkoordinasikan waktu, tempat, dan guru yang tersedia. Menyesuaikan jadwal sesuai dengan kebutuhan siswa dan memastikan kelancaran proses pembelajaran."
            ],
            [
                "item_kerja" => "Menyusun modul pembelajaran dan materi ajar.",
                "deskripsi" => "Mengembangkan modul pembelajaran yang terstruktur dan sesuai dengan kurikulum yang berlaku. Menyusun materi ajar yang komprehensif dan memastikan tersedianya sumber belajar yang relevan dan bermutu."
            ],
            [
                "item_kerja" => "Mengevaluasi perkembangan siswa.",
                "deskripsi" => "Melakukan evaluasi terhadap kemajuan belajar siswa secara berkala. Menggunakan berbagai metode penilaian, seperti ujian, tugas, atau tes lainnya, untuk menilai pemahaman dan pencapaian siswa serta memberikan umpan balik yang konstruktif."
            ],
            [
                "item_kerja" => "Memberikan bimbingan akademik kepada siswa.",
                "deskripsi" => "Memberikan bimbingan dan dorongan kepada siswa dalam mencapai tujuan akademik mereka. Membantu siswa memahami konsep yang sulit, memberikan strategi belajar yang efektif, dan memberikan motivasi dalam meningkatkan prestasi mereka."
            ],
            [
                "item_kerja" => "Mengembangkan program pembelajaran khusus.",
                "deskripsi" => "Mengidentifikasi kebutuhan siswa yang memerlukan perhatian khusus, seperti siswa dengan kesulitan belajar atau siswa berprestasi tinggi. Mengembangkan program pembelajaran yang sesuai untuk memenuhi kebutuhan mereka dan memberikan dukungan yang dibutuhkan."
            ],
            [
                "item_kerja" => "Melakukan pemantauan dan evaluasi terhadap kualitas pengajaran.",
                "deskripsi" => "Melakukan pemantauan terhadap kualitas pengajaran yang diberikan oleh guru-guru bimbel atau les privat. Menyusun dan melaksanakan program evaluasi pengajaran, serta memberikan umpan balik dan saran untuk meningkatkan kualitas pembelajaran."
            ],
            [
                "item_kerja" => "Mengelola program remedial atau pengayaan.",
                "deskripsi" => "Mengidentifikasi siswa yang memerlukan bantuan tambahan dalam memahami materi pelajaran (program remedial) atau siswa yang membutuhkan tantangan lebih (program pengayaan). Mengatur dan mengelola program-program tersebut untuk meningkatkan hasil belajar siswa."
            ],
            [
                "item_kerja" => "Mengkoordinasikan program tryout.",
                "deskripsi" => "Mengorganisir dan mengkoordinasikan program tryout sebagai persiapan siswa menghadapi ujian atau tes penting. Menyusun jadwal, mengatur lokasi, dan menghubungi peserta serta memberikan petunjuk dan panduan terkait program tryout."
            ],
            [
                "item_kerja" => "Melakukan analisis data hasil tryout.",
                "deskripsi" => "Menganalisis data hasil tryout untuk mengidentifikasi kelemahan dan kekuatan siswa dalam memahami materi pelajaran. Menggunakan analisis ini untuk memberikan masukan kepada guru dan siswa guna meningkatkan strategi pembelajaran dan pemahaman materi."
            ],
            [
                "item_kerja" => "Mengembangkan dan mengelola program mentoring.",
                "deskripsi" => "Merancang program mentoring yang efektif untuk membantu siswa dalam mempersiapkan diri untuk ujian atau tes penting. Mengidentifikasi mentor yang sesuai, memfasilitasi pertemuan antara mentor dan siswa, dan memastikan berlangsungnya bimbingan yang berkualitas."
            ],
            [
                "item_kerja" => "Mengelola sistem informasi siswa.",
                "deskripsi" => "Mengelola dan memelihara basis data siswa yang terintegrasi. Memperbarui informasi pribadi, riwayat belajar, dan perkembangan siswa secara berkala. Memastikan data siswa tersedia secara akurat dan aman."
            ],
            [
                "item_kerja" => "Membantu dalam penyusunan kurikulum.",
                "deskripsi" => "Berkontribusi dalam penyusunan kurikulum yang sesuai dengan kebutuhan siswa dan mengikuti standar pendidikan yang berlaku. Memberikan masukan dan saran dalam pengembangan materi pelajaran yang relevan dan metode pembelajaran yang efektif."
            ],
            [
                "item_kerja" => "Berkoordinasi dengan orang tua siswa.",
                "deskripsi" => "Menjalin komunikasi yang efektif dengan orang tua siswa untuk memberikan informasi terkait perkembangan akademik anak mereka. Memberikan update mengenai prestasi siswa, rekomendasi peningkatan, dan menjawab pertanyaan atau kekhawatiran orang tua terkait pembelajaran anak mereka."
            ],
            [
                "item_kerja" => "Melakukan penilaian kebutuhan belajar siswa.",
                "deskripsi" => "Mengidentifikasi kebutuhan belajar individu siswa melalui pengamatan, analisis kinerja, dan komunikasi dengan siswa dan orang tua. Merancang program pembelajaran yang disesuaikan dengan kebutuhan belajar siswa untuk memastikan kemajuan yang optimal."
            ],
            [
                "item_kerja" => "Menyusun dan mengembangkan materi pembelajaran digital.",
                "deskripsi" => "Merancang, mengembangkan, dan mengkaji ulang materi pembelajaran digital yang inovatif dan menarik untuk meningkatkan interaksi dan keterlibatan siswa. Menggunakan teknologi pendidikan terkini dalam pengembangan materi, seperti video pembelajaran, animasi, atau platform pembelajaran daring."
            ],
            [
                "item_kerja" => "Mengadakan sesi bimbingan studi dan motivasi.",
                "deskripsi" => "Mengadakan sesi bimbingan studi dan motivasi bagi siswa, baik secara individu maupun kelompok. Memberikan strategi efektif dalam mengatur waktu belajar, teknik belajar yang efisien, dan memberikan motivasi dan dukungan yang diperlukan bagi siswa."
            ],
            [
                "item_kerja" => "Melakukan koordinasi dengan sekolah dan lembaga pendidikan lainnya.",
                "deskripsi" => "Berkoordinasi dengan sekolah dan lembaga pendidikan lainnya untuk memastikan sinergi antara program bimbel atau les privat dengan kurikulum yang berlaku. Mendiskusikan metode dan strategi pembelajaran yang efektif serta menjalin kerjasama untuk meningkatkan hasil belajar siswa."
            ],
            [
                "item_kerja" => "Menyusun laporan perkembangan belajar siswa.",
                "deskripsi" => "Menyusun laporan reguler yang menggambarkan perkembangan belajar siswa, termasuk kehadiran, nilai ujian, dan evaluasi kemajuan. Berkomunikasi dengan orang tua atau wali siswa mengenai perkembangan belajar siswa dan memberikan rekomendasi untuk perbaikan yang diperlukan."
            ],
            [
                "item_kerja" => "Mengelola program penghargaan dan insentif.",
                "deskripsi" => "Mengembangkan dan mengelola program penghargaan dan insentif untuk mendorong dan memotivasi siswa dalam mencapai hasil belajar yang baik. Mengatur sistem penghargaan, seperti sertifikat prestasi atau hadiah lainnya, dan memonitor partisipasi dan pencapaian siswa dalam program ini."
            ],
            [
                "item_kerja" => "Mengikuti perkembangan dan tren dalam dunia pendidikan.",
                "deskripsi" => "Mengikuti perkembangan terkini dalam dunia pendidikan, termasuk kebijakan dan inovasi pendidikan. Mempelajari tren baru dalam metode pembelajaran, teknologi pendidikan, dan penelitian pendidikan untuk memperbarui dan meningkatkan strategi pembelajaran yang digunakan dalam bimbel atau les privat."
            ],

            // marketing
            [
                "item_kerja" => "Merancang dan melaksanakan strategi pemasaran.",
                "deskripsi" => "Mengidentifikasi target pasar, menganalisis persaingan, dan merancang strategi pemasaran yang efektif untuk meningkatkan jumlah siswa yang mendaftar di bimbel dan les privat perusahaan."
            ],
            [
                "item_kerja" => "Mengembangkan dan melaksanakan kampanye pemasaran.",
                "deskripsi" => "Mengembangkan kampanye pemasaran yang menarik, termasuk iklan online, pemasaran email, pemasaran media sosial, dan kegiatan promosi lainnya untuk meningkatkan kesadaran merek dan menghasilkan prospek baru."
            ],
            [
                "item_kerja" => "Menganalisis tren pasar dan mengidentifikasi peluang baru.",
                "deskripsi" => "Melakukan riset pasar secara teratur untuk mengidentifikasi tren, kebutuhan, dan preferensi pelanggan potensial. Menggunakan informasi ini untuk mengidentifikasi peluang baru dalam meningkatkan penjualan dan kehadiran perusahaan di pasar."
            ],
            [
                "item_kerja" => "Membangun dan memelihara hubungan dengan pelanggan.",
                "deskripsi" => "Membangun hubungan yang kuat dengan pelanggan saat ini dan potensial. Mengelola komunikasi dengan pelanggan melalui berbagai saluran, memberikan dukungan pelanggan yang efektif, dan memastikan kepuasan pelanggan yang tinggi."
            ],
            [
                "item_kerja" => "Mengatur dan berpartisipasi dalam acara pemasaran.",
                "deskripsi" => "Mengatur dan mengkoordinasikan acara pemasaran, seperti pameran pendidikan, seminar, atau workshop. Berpartisipasi dalam acara tersebut untuk mempromosikan produk dan layanan bimbel dan les privat perusahaan."
            ],
            [
                "item_kerja" => "Mengelola konten pemasaran.",
                "deskripsi" => "Membuat, mengedit, dan mengelola konten pemasaran yang menarik, termasuk materi promosi, brosur, panduan studi, dan konten digital lainnya. Memastikan konsistensi merek dan pesan perusahaan dalam semua materi pemasaran."
            ],
            [
                "item_kerja" => "Membangun kemitraan strategis.",
                "deskripsi" => "Mengidentifikasi dan menjalin kemitraan dengan lembaga pendidikan, sekolah, atau organisasi lain yang dapat menjadi mitra strategis untuk mempromosikan produk dan layanan perusahaan. Melakukan negosiasi dan mengelola hubungan dengan mitra tersebut."
            ],
            [
                "item_kerja" => "Membuat dan meluncurkan program referral.",
                "deskripsi" => "Mengembangkan program referral untuk mendorong pelanggan saat ini untuk merekomendasikan bimbel dan les privat kepada teman dan keluarga mereka. Meluncurkan program ini dengan memastikan insentif yang menarik dan melakukan pemantauan dan penghargaan bagi pelanggan yang berhasil mereferensikan siswa baru."
            ],
            [
                "item_kerja" => "Melakukan riset pesaing.",
                "deskripsi" => "Melakukan riset kompetitor untuk memahami strategi pemasaran pesaing di industri bimbel dan les privat. Menganalisis produk, harga, promosi, dan strategi distribusi pesaing. Menggunakan informasi ini untuk mengidentifikasi keunggulan kompetitif perusahaan dan mengembangkan strategi pemasaran yang lebih efektif."
            ],
            [
                "item_kerja" => "Melakukan analisis pasar dan segmentasi pelanggan.",
                "deskripsi" => "Mengumpulkan data pasar dan melakukan analisis yang mendalam untuk memahami preferensi dan kebutuhan pelanggan potensial. Melakukan segmentasi pelanggan berdasarkan kriteria demografis, geografis, dan perilaku untuk mengarahkan upaya pemasaran dengan lebih efektif."
            ],
            [
                "item_kerja" => "Melakukan penelitian kata kunci untuk strategi pemasaran digital.",
                "deskripsi" => "Melakukan penelitian kata kunci untuk strategi pemasaran digital, termasuk SEO (Search Engine Optimization) dan kampanye iklan online. Mengidentifikasi kata kunci yang relevan dengan bimbel dan les privat serta mengoptimalkan konten dan kampanye untuk meningkatkan visibilitas dan konversi."
            ],
            [
                "item_kerja" => "Melakukan survei dan analisis kepuasan pelanggan.",
                "deskripsi" => "Melakukan survei pelanggan secara rutin untuk mengukur tingkat kepuasan dan memperoleh masukan yang berharga. Menganalisis data survei untuk mengidentifikasi area di mana perusahaan dapat meningkatkan pelayanan dan pengalaman pelanggan."
            ],
            [
                "item_kerja" => "Membangun dan mengelola strategi pemasaran email.",
                "deskripsi" => "Merancang dan mengelola kampanye pemasaran email yang efektif untuk berkomunikasi dengan pelanggan dan calon siswa. Membuat konten yang menarik, merencanakan jadwal pengiriman, dan melakukan analisis hasil kampanye untuk meningkatkan tingkat keterlibatan dan konversi."
            ],
            [
                "item_kerja" => "Melakukan pemantauan dan analisis kinerja pemasaran.",
                "deskripsi" => "Memantau dan menganalisis kinerja berbagai upaya pemasaran, termasuk iklan online, media sosial, kampanye email, dan kegiatan promosi lainnya. Menggunakan alat analisis untuk mengukur ROI (Return on Investment) dan mengidentifikasi area yang perlu ditingkatkan dalam strategi pemasaran."
            ]

        ];

        $pembuatan_logbook = Tanggal_pembuatan_logbook::all();
        $i = 0;
        foreach($pembuatan_logbook as $row){
            $notes[$i]["logbook_dibuat_id"] = $row->id;
            $i++;
        }

        Logbook_notes::insert($notes);
    }
}
