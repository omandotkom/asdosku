<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Catatan buat palupi*/
        /* service_id itu di isi dengan kategori dia. Buka file excel terbaru, terus liat kolom
        NAMA KEGIATAN yang LES PRIVAT SD, nah dia kan bagian dari bimbel jadi service_id nya di isi dengaan asbimbinganbelajar
        
        oh ya perhatikan huruf kapital di setiap awal kata di bagian name ya kaya contoh di bawah Les Privat SD*/
        DB::table('activities')->insert([[
            'service_id' => 'asbimbinganbelajar', //1 adalah nomor as-makul pada file excel
            'name' => 'Les Privat SD',
            'satuan' => 'Orang',
            'harga' => 170000,
            
            'keterangan' => 'Maksimal 2 orang perbulan 4x pertemuan',
            'asdosku' => 0.2, // artinya 20%
            'asdos' => 0.8 //artinya 80%
        ],
        [
        	'service_id' => 'asbimbinganbelajar',
            'name' => 'Les Privat SMP',
            'satuan' => 'Orang',
            'harga' => 240000,
            
            'keterangan' => 'Maksimal 2 orang perbulan 4x pertemuan',
            'asdosku' => 0.2,
            'asdos' => 0.8

        ],
        [
        	'service_id' => 'asbimbinganbelajar',
            'name' => 'Les Privat SMA',
            'satuan' => 'Orang',
            'harga' => 310000,
           
            'keterangan' => 'Maksimal 2 orang perbulan 4x pertemuan',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'asbimbinganbelajar',
            'name' => 'Les Privat Mahasiswa dan Umum',
            'satuan' => 'Orang',
            'harga' => 410000,
            
            'keterangan' => 'Maksimal 2 orang perbulan 4x pertemuan',
            'asdosku' => 0.2,
            'asdos' => 0.8

        ],
        [
            'service_id' => 'aspraktikum',
            'name' => 'Asisten Praktikum',
            'satuan' => 'Orang',
            'harga' => 200000,
            
            'keterangan' => '4x pertemuan, 1 matakuliah praktikum',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'asbimbinganbelajar',
            'name' => 'Les Privat TK',
            'satuan' => 'Orang',
            'harga' => 170000,
            
            'keterangan' => 'Maksimal 2 orang perbulan 4x pertemuan',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'asbimbinganbelajar',
            'name' => 'Les Grup SD',
            'satuan' => 'Orang',
           
            'harga' => 310000,
            'keterangan' => 'Maksimal 10 orang',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'asbimbinganbelajar',
            'name' => 'Les Grup SMP',
            'satuan' => 'Orang',
            
            'harga' => 410000,
            'keterangan' => 'Maksimal 10 orang',
            'asdosku' => 0.2,
            'asdos' => 0.8	
        ],
        [
        	'service_id' => 'asbimbinganbelajar',
            'name' => 'Belajar Bareng SMA',
            'satuan' => 'Orang',
            'harga' => 510000,
            'keterangan' => 'Maksimal 10 orang',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],

        // asmatakuliah //
        [
        	'service_id' => 'asmatakuliah',
            'name' => 'Pengawas Ujian',
            'satuan' => 'Orang',
            'harga' => 200000,
            
            'keterangan' => 'Masa tugas 2 minggu di hari kerja',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'asmatakuliah',
            'name' => 'Koreksi Nilai',
            'satuan' => 'Paket',
            'harga' => 100000,
            'keterangan' => 'Per paket berisi 100 lembar koreksi. Menambah setiap 1-50 lembar koreksi Rp.50.000,- ; setiap 50-100 lembar koreksi Rp.100.000,-',
            'asdosku' => 0.3,
            'asdos' => 0.7
        ],
        [
        	'service_id' => 'asmatakuliah',
            'name' => 'Asdos Mata Kuliah',
            'satuan' => 'Bulan',
            'harga' => 200000,
            'keterangan' => '4x pertemuan, 1 matakuliah',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],

        // aspenelitian //
        [
        	'service_id' => 'aspenelitian',
            'name' => 'Asisten Penelitian',
            'satuan' => 'Orang/bulan',
            'harga' => 500000,
            'keterangan' => 'Membantu keperluan administrasi dan data penelitian Biaya dikenakan untuk hari kerja (senin-jumat)',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'aspenelitian',
            'name' => 'Kuesioner plus Souvenir',
            'satuan' => 'Kuesioner',
            'harga' => 8500,
            'keterangan' => 'Biaya transport, penggandaan kuesioner, serta biaya perizinan lainnya ditanggung klien',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'aspenelitian',
            'name' => 'Kuesioner tanpa Souvenir',
            'satuan' => 'Kuesioner',
            'harga' => 6000,
            'keterangan' => 'Biaya transport, penggandaan kuesioner, serta biaya perizinan lainnya ditanggung klien',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'aspenelitian',
            'name' => 'Tabulasi Data',
            'satuan' => 'Data',
            'harga' => 100000,
            'keterangan' => 'Maksimal 100 data. Lebih dari 100 data, pesan 2x layanan',
            'asdosku' => 0.3,
            'asdos' => 0.7
        ],
        [
        	'service_id' => 'aspenelitian',
            'name' => 'Mencari Data Sekunder',
            'satuan' => 'Jurnal/laporan',
            'harga' => 3000,
            'keterangan' => 'Jurnal/laporan dapat diakses melalui internet',
            'asdosku' => 0.3,
            'asdos' => 0.7
        ],

        // asproyek //
        [
        	'service_id' => 'asproyek',
            'name' => 'Asisten Auditor',
            'satuan' => 'Per periode audit',
            'harga' => 600000,
            'keterangan' => 'Membuat keperluan administrasi dan penataan arsip',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'asproyek',
            'name' => 'Laporan Keuangan Bisnis',
            'satuan' => 'Laporan',
            'harga' => 380000,
            'keterangan' => 'Pembuatan laporan keuangan mulai dari pengumpulan bukti transaksi hingga penyusunan CALK',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'asproyek',
            'name' => 'Pembuatan LPJ',
            'satuan' => 'Laporan',
            'harga' => 200000,
            'keterangan' => 'Mengumpulkan bukti transaksi dan menyusun laporan. Sudah termasuk biaya cetak',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'asproyek',
            'name' => 'Pembuatan Proposal',
            'satuan' => 'Proposal',
            'harga' => 210000,
            'keterangan' => 'Menyusun dan mendesain proposal premium (konsep dari klien), maksimal 12 halaman, 2 kali revisi',
            'asdosku' => 0.3,
            'asdos' => 0.7
        ],
        [
        	'service_id' => 'asproyek',
            'name' => 'Pembuatan SPT',
            'satuan' => 'Wajib pajak',
            'harga' => 300000,
            'keterangan' => 'Menyusun dan mengumpulkan berkas yang diperlukan, pembuatan hingga finishing',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],

        // aspengabdian //
        [
        	'service_id' => 'aspengabdian',
            'name' => 'Pengabdian Masyarakat',
            'satuan' => 'Orang',
            'harga' => 200000,
            'keterangan' => 'Menyiapkan segala keperluan pra-pengabdian dan mendampingi saat melakukan pengabdian di lapangan',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'aspengabdian',
            'name' => 'Internship on Workshop',
            'satuan' => 'Orang/bulan',
            'harga' => 450000,
            'keterangan' => 'Outsourcing bidang apa saja termasuk marketing. Biaya dikenakan untuk hari kerja (senin-jumat)',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'aspengabdian',
            'name' => 'Internship on Campus',
            'satuan' => 'Orang/bulan',
            'harga' => 350000,
            'keterangan' => 'Outsourcing bidang administrasi (bukan bidang marketing). Biaya dikenakan untuk hari kerja (senin-jumat)',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'aspengabdian',
            'name' => 'Mengelola Website',
            'satuan' => 'Bulan',
            'harga' => 360000,
            'keterangan' => 'Input data, update produk/artikel, dan kebutuhan lainnya',
            'asdosku' => 0.25,
            'asdos' => 0.75
        ],
        [
        	'service_id' => 'aspengabdian',
            'name' => 'Manajamen Kost',
            'satuan' => 'Kostan',
            'harga' => 200000,
            'keterangan' => 'Penagihan, pengecekkan, informasi kost',
            'asdosku' => 0.25,
            'asdos' => 0.75
        ],
        [
        	'service_id' => 'aspengabdian',
            'name' => 'Admin Instagram',
            'satuan' => 'Akun/bulan',
            'harga' => 450000,
            'keterangan' => '2 postingan per hari dalam 5 hari kerja, tidak termasuk bahan posting, sudah termasuk biaya instagram marketing dan internet selama satu bulan',
            'asdosku' => 0.3,
            'asdos' => 0.7
        ],
        [
        	'service_id' => 'aspengabdian',
            'name' => 'Admin Whatsapp',
            'satuan' => 'Akun/bulan',
            'harga' => 300000,
            'keterangan' => 'Termasuk biaya di internet',
            'asdosku' => 0.3,
            'asdos' => 0.7
        ],

        // askarya //
        [
        	'service_id' => 'askarya',
            'name' => 'Edit/ Upload Jurnal',
            'satuan' => 'Jurnal',
            'harga' => 25000,
            'keterangan' => 'Melakukan edit sesuai format (tidak termasuk pengerjaan isi jurnal)',
            'asdosku' => 0.3,
            'asdos' => 0.7
        ],
        [
        	'service_id' => 'askarya',
            'name' => 'Reviu Jurnal Internasional',
            'satuan' => 'Jurnal',
            'harga' => 40000,
            'keterangan' => 'Melakukan translit jurnal serta reviu jurnal',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'askarya',
            'name' => 'Reviu Jurnal Nasional',
            'satuan' => 'Jurnal',
            'harga' => 20000,
            'keterangan' => ' ', // blm ada ket.
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'askarya',
            'name' => 'Repost Data',
            'satuan' => 'Data',
            'harga' => 100000,
            'keterangan' => 'Maksimal 100 data', 
            'asdosku' => 0.3,
            'asdos' => 0.7
        ],
        [
        	'service_id' => 'askarya',
            'name' => 'Input Data Offline',
            'satuan' => 'Lembar/ file',
            'harga' => 2500,
            'keterangan' => ' ', // blm ada ket.
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'askarya',
            'name' => 'Input Data Online',
            'satuan' => 'File',
            'harga' => 5000,
            'keterangan' => 'Sudah termasuk biaya internet', 
            'asdosku' => 0.3,
            'asdos' => 0.7
        ],
        [
        	'service_id' => 'askarya',
            'name' => 'Pembuatan Surat',
            'satuan' => 'Surat',
            'harga' => 80000,
            'keterangan' => 'Surat formal, dilengkapi proses permintaan TTD pihakyang ada di surat. Belum termasuk biaya cetak', 
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'askarya',
            'name' => 'Jasa Trasnsliterasi Pro (Indonesia ke Inggris)',
            'satuan' => 'Lembar',
            'harga' => 12000,
            'keterangan' => 'Ukuran maksimal F4. Revisi 2x', 
            'asdosku' => 0.3,
            'asdos' => 0.7
        ],
        [
        	'service_id' => 'askarya',
            'name' => 'Jasa Trasnsliterasi Reguler (Indonesia ke Inggris)',
            'satuan' => 'Lembar',
            'harga' => 1500,
            'keterangan' => 'Ukuran maksimal A4. Menggunakan google  translate Disertai proses merapikan hasil', 
            'asdosku' => 0.3,
            'asdos' => 0.7
        ],
        [
        	'service_id' => 'askarya',
            'name' => 'Jasa Pengetikan',
            'satuan' => 'Lembar',
            'harga' => 2500,
            'keterangan' => 'Ukuran maksimal F4, spasi minimal 1,5. Hardfile ke softfile', 
            'asdosku' => 0.3,
            'asdos' => 0.7
        ],

         // asdesainer //
        [
        	'service_id' => 'asdesainer',
            'name' => 'Desain Pamflet',
            'satuan' => 'Pamflet',
            'harga' => 85000,
            'keterangan' => 'Belum termasuk biaya cetak, revisi sampai jadi',
            'asdosku' => 0.3,
            'asdos' => 0.7
        ],
        [
        	'service_id' => 'asdesainer',
            'name' => 'Desain Banner',
            'satuan' => 'Banner',
            'harga' => 70000,
            'keterangan' => 'Belum termasuk biaya cetak, revisi sampai jadi',
            'asdosku' => 0.3,
            'asdos' => 0.7
        ],
        [
        	'service_id' => 'asdesainer',
            'name' => 'Desain Kartu Nama',
            'satuan' => 'Kartu',
            'harga' => 72000,
            'keterangan' => 'Satu desain untuk dua sisi, sudah termasuk biaya cetak (100 lembar kartu)',
            'asdosku' => 0.3,
            'asdos' => 0.7
        ],
        [
        	'service_id' => 'asdesainer',
            'name' => 'Desain Cover',
            'satuan' => 'Cover',
            'harga' => 80000,
            'keterangan' => 'Cover untuk buku, proposal, laporan. Biaya dihitung untuk satu cover (dua sisi/depan & belakang) revisi 1x',
            'asdosku' => 0.3,
            'asdos' => 0.7
        ],
        [
        	'service_id' => 'asdesainer',
            'name' => 'Desain Website Komplit',
            'satuan' => 'Website',
            'harga' => 1500000,
            'keterangan' => 'Sudah termasuk hosting dan domain, revisi 2x',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'asdesainer',
            'name' => 'Desain Website Biasa',
            'satuan' => 'Website',
            'harga' => 500000,
            'keterangan' => 'Tidak termasuk biaya hosting. Revisi 2x',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
        [
        	'service_id' => 'asdesainer',
            'name' => 'Desain Logo',
            'satuan' => 'Logo',
            'harga' => 180000,
            'keterangan' => 'Pembuatan logo sesuai konsep yang diinginkan serta filosofi logo tersebut. Revisi sampai cocok',
            'asdosku' => 0.2,
            'asdos' => 0.8
        ],
            
        ]);
    }
}
