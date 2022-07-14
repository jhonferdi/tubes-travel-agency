<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = Storage::putFile('public/destination-images', new File('public/images/seeder/telaga.jpeg'));
        Destination::create([
            'nama' => 'Telaga Warna',
            'gambar' => str_replace('public/','storage/',$path),
            'deskripsi' => 'Nama Telaga Warna sendiri diberikan karena keunikan fenomena alam yang terjadi di tempat ini, yaitu warna air dari telaga tersebut yang sering berubah-ubah.',
            'lokasi' => 'Dieng',
            'harga' => 'Rp15000/orang',
            'link_resmi' => null,
            'kategori' => 'Wisata Alam'
        ]);

        $path = Storage::putFile('public/destination-images', new File('public/images/seeder/candi-dieng.jpg'));
        Destination::create([
            'nama' => 'Candi Dieng',
            'gambar' => str_replace('public/','storage/',$path),
            'deskripsi' => 'Kompleks Candi Dieng adalah kelompok kompleks candi Hindu abad ke-7 terletak di Dataran Tinggi Dieng, Kabupaten Banjarnegara, Jawa Tengah, Indonesia.Kompleks yang terdiri dari beberapa bangunan ini berasal dari Kerajaan Kalingga.',
            'lokasi' => 'Dieng',
            'harga' => 'Rp15000/orang',
            'link_resmi' => null,
            'kategori' => 'Wisata Alam'
        ]);

        $path = Storage::putFile('public/destination-images', new File('public/images/seeder/kawah.jpg'));
        Destination::create([
            'nama' => 'Kawah Sikidang',
            'gambar' => str_replace('public/','storage/',$path),
            'deskripsi' => 'Kawah sikidang merupakan kawah aktif tersbesar yang ada di Dataran Tinggi Dieng. Kawah ini memiliki satu telaga air panas kecil dengan air yang selalu mendidih dan lapangan celah gas dengan titik-titik yang selalu berpindah-pindah di dalam suatu lapangan seluas lebih kurang 4 hektare.',
            'lokasi' => 'Desa Dieng Kulon, Kabupaten Banjarnegara.',
            'harga' => 'Rp20000/orang',
            'link_resmi' => null,
            'kategori' => 'Wisata Alam'
        ]);

        $path = Storage::putFile('public/destination-images', new File('public/images/seeder/sikunir.jpg'));
        Destination::create([
            'nama' => 'Bukit Sikunir',
            'gambar' => str_replace('public/','storage/',$path),
            'deskripsi' => 'Di Dieng, terdapat banyak bukit atau gunung yang bisa dijadikan pilihan untuk menikmati panorama sunrise karena kawasan Dieng merupakan dataran tinggi. Salah satu bukit yang populer di Dieng dengan panorama sunrise-nya adalah Bukit Sikunir.',
            'lokasi' => 'Dieng',
            'harga' => 'Rp10000/orang',
            'link_resmi' => null,
            'kategori' => 'Wisata Alam'
        ]);

        $path = Storage::putFile('public/destination-images', new File('public/images/seeder/kuliner.jpg'));
        Destination::create([
            'nama' => 'Kuliner Banjarnegara',
            'gambar' => str_replace('public/','storage/',$path),
            'deskripsi' => 'Beranekaragam makanan dan minuman khas Banjarnegara tersaji di gedung kuliner ini. Berbagai makanan kekinian pun tersedia di sini. Harga makanan dan minuman di sini sangat terjangkau.',
            'lokasi' => 'Jl. Raya Brengkok, Banjarnegara',
            'harga' => 'Rp2000/motor | Rp5000/mobil',
            'link_resmi' => null,
            'kategori' => 'Kuliner'
        ]);

        $path = Storage::putFile('public/destination-images', new File('public/images/seeder/soto.jpg'));
        Destination::create([
            'nama' => 'Soto Krandegan',
            'gambar' => str_replace('public/','storage/',$path),
            'deskripsi' => 'Soto ini memiliki rasa kuah yang kaya, mulai dari rasa gurih hingga rasa rempah dari bumbu khas yang berasal dari kunyit, lengkuas dan serai. Dagingnya yang empuk dikukus hingga empat jam sehingga kenikmatan yang dihasilkan soto ini sangat lengkap.',
            'lokasi' => 'Soto Pak Aping, Krandegan, Banjarnegara',
            'harga' => 'Rp15000/porsi',
            'link_resmi' => null,
            'kategori' => 'Kuliner'
        ]);

        $path = Storage::putFile('public/destination-images', new File('public/images/seeder/syh.jpg'));
        Destination::create([
            'nama' => 'Hotel Surya Yudha',
            'gambar' => str_replace('public/','storage/',$path),
            'deskripsi' => 'Hotel berbintang tiga yang menyediakan 169 kamar eksklusif dan 2 Villa. Untuk anda yang mengedepankan kenyaman dan kemudahan akses dengan kawasan wisata, Hotel Surya Yudha adalah pilihan yang tepat untuk liburan anda. Selain nyaman, Surya Yudha Hotel memiliki banyak fasilitas pendukung yang dapat dinikmati oleh seluruh keluarga.',
            'lokasi' => 'Jl. Raya Rejasa No.KM, RW.1, Rejasa',
            'harga' => null,
            'link_resmi' => "http://www.suryayudhapark.com/service/hotel/",
            'kategori' => 'Hotel'
        ]);

        $path = Storage::putFile('public/destination-images', new File('public/images/seeder/central.jpg'));
        Destination::create([
            'nama' => 'Hotel Central',
            'gambar' => str_replace('public/','storage/',$path),
            'deskripsi' => 'Hotel yang berada di tengah kota yang dekat dengan alun-alun Banjarnegara',
            'lokasi' => 'Jl. Panjaitan No. 24  Banjarnegara',
            'harga' => null,
            'link_resmi' => 'http://budparbanjarnegara.com/sarana-akomodasi/hotel-dan-penginapan/hotel-central/',
            'kategori' => 'Hotel'
        ]);

        $path = Storage::putFile('public/destination-images', new File('public/images/seeder/billiard.jpg'));
        Destination::create([
            'nama' => 'Billiard Surya Yudha',
            'gambar' => str_replace('public/','storage/',$path),
            'deskripsi' => 'Billiard bisa menjadi sarana hiburan dan interaksi sosial yang baik.',
            'lokasi' => 'Jl. Raya Rejasa No.KM, RW.1, Rejasa',
            'harga' => 'Rp20000/jam (Champion table) | Rp25000/jam (Murray table)',
            'link_resmi' => null,
            'kategori' => 'Hiburan'
        ]);

        $path = Storage::putFile('public/destination-images', new File('public/images/seeder/alun.jpg'));
        Destination::create([
            'nama' => 'Alun-Alun Banjarnegara',
            'gambar' => str_replace('public/','storage/',$path),
            'deskripsi' => 'Wisata Alun Alun Kota Banjarnegara Jawa Tengah sangat cocok untuk mengisi kegiatan liburan anda. Wisata Alun Alun Kota Banjarnegara Jawa Tengah ini sangatlah baik bagi anda semua yang berada di dekat atau di kejauhan untuk merapat mengunjungi tempat Wisata Alun Alun Kota Banjarnegara',
            'lokasi' => 'Kutabanjar',
            'harga' => 'Gratis',
            'link_resmi' => null,
            'kategori' => 'Hiburan'
        ]);
    }
}
