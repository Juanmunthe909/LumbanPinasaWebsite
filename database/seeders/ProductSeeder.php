<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            [
                'title' => 'Jagung',
                'cover' => 'jagung.jpg',
                'price' => '5000',
                'phone' => '0813-9721-6764',
                'address' => 'Jalan Seminarum Sipoholon Lumban Pinasa No 3',
                'stock' => '150',
                'description' => 'Jagung sangat berkualitas yang bagus untuk pakan ternak',
                'category' => 'Buah',
            ],
            [
                'title' => 'Cabai',
                'cover' => 'cabai 1.jpg',
                'price' => '25000',
                'phone' => '0813-9721-6764',
                'address' => 'Jalan Seminarum Sipoholon Lumban Pinasa No 5',
                'stock' => '100',
                'description' => 'Cabai merah yang berkualitas dan tidak keriput',
                'category' => 'Buah',
            ],
            [
                'title' => 'Coklat',
                'cover' => 'coklat.jpg',
                'price' => '15000',
                'phone' => '0822-7406-7622',
                'address' => 'Jalan Seminarum Sipoholon Lumban Pinasa No 20',
                'stock' => '50',
                'description' => 'Buah coklat dengan warna yang tidak pucat dan rasanya manis',
                'category' => 'Buah',
            ],
            [
                'title' => 'Jeruk',
                'cover' => 'jeruk.jpg',
                'price' => '25000',
                'phone' => '0821-6896-8581',
                'address' => 'Jalan Seminarum Sipoholon Lumban Pinasa No 4',
                'stock' => '60',
                'description' => 'Jeruk manis, segar, dan besar yang baik untuk kesehatan',
                'category' => 'Buah',
            ],
            [
                'title' => 'Kopi',
                'cover' => 'kopi 2.jpeg',
                'price' => '30000',
                'phone' => '0821-2402-6733',
                'address' => 'Jalan Seminarum Sipoholon Lumban Pinasa No 6',
                'stock' => '100',
                'description' => 'Tersedia Kopi dan Harga Murah dan Berkualitas',
                'category' => 'Buah',
            ],
            [
                'title' => 'Serai',   
                'cover' => 'serai.jpg',
                'price' => '2000',
                'phone' => '0822-7404-0505', 
                'address' => 'Jalan Seminarum Sipoholon Lumban Pinasa No 2',
                'stock' => '50',
                'description' => 'Tumbuhan serai yang tumbuh lebat dan hijau', 
                'category' => 'Sayur',
            ],
            [
                'title' => 'Kacang',
                'cover' => 'kacang.jpeg',
                'price' => '10000',
                'phone' => '0822-1967-6608',
                'address' => 'Jalan Seminarum Sipoholon Lumban Pinasa No 6',
                'stock' => '200',
                'description' => 'Jual Kacang yang kaya akan berbagai nutrisi. ',
                'category' => 'Sayur',
            ],
            [
                'title' => 'Tomat',
                'cover' => 'tomat.jpg',
                'price' => '10000',
                'phone' => '0822-7439-9206',
                'address' => 'Jalan Seminarum Sipoholon Lumban Pinasa No 10',
                'stock' => '150',
                'description' => 'Jual Buah tomat merah segar dan besar',
                'category' => 'Sayur',
            ],
            [
                'title' => 'Padi',
                'cover' => 'padi 1.jpg',
                'price' => '60000',
                'phone' => '0813-8714-2726',
                'address' => 'Jalan Seminarum Sipoholon Lumban Pinasa No 6',
                'stock' => '200',
                'description' => 'Jual padi unggul kualitas terbaik harga murah',
                'category' => 'Sayur',
            ],
            [
                'title' => 'Kentang',
                'cover' => 'kentang.jpeg',
                'price' => '15000',
                'phone' => '0822-7406-7622',
                'address' => 'Jalan Seminarum Sipoholon Lumban Pinasa No 2',
                'stock' => '100',
                'description' => 'Jual Buah tomat merah segar dan besar',
                'category' => 'Sayur',
            ],
            [
                'title' => 'Sayuran',
                'cover' => 'sayur 1.jpg',
                'price' => '3000',
                'phone' => '0813-9721-6764',
                'address' => 'Jalan Seminarum Sipoholon Lumban Pinasa No 4',
                'stock' => '200',
                'description' => 'Sayuran segar harga terjangkau tanpa pestisida.',
                'category' => 'Sayur',
            ],
            [
                'title' => 'Timun',
                'cover' => 'timun 2.jpg',
                'price' => '8000',
                'phone' => '0823-6305-8746',
                'address' => 'Jalan Seminarum Sipoholon Lumban Pinasa No 6',
                'stock' => '50',
                'description' => 'Timun segar langsung dari petani dan harga murah',
                'category' => 'Sayur',
            ],
        );
        foreach ($data as $d) {
            Product::create([
                'title' => $d['title'],
                'cover' => $d['cover'],
                'price' => $d['price'],
                'phone' => $d['phone'],
                'address' => $d['address'],
                'stock' => $d['stock'],
                'description' => $d['description'],
                'category' => $d['category']
            ]);
        }
    }
}
