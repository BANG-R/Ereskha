<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Categories
        $categories = [
            [
                'name' => 'Kerudung',
                'slug' => 'kerudung',
                'description' => 'Koleksi kerudung premium dengan berbagai model dan warna yang elegan untuk melengkapi penampilan muslimah modern Anda.',
                'image' => null,
            ],
            [
                'name' => 'Gamis',
                'slug' => 'gamis',
                'description' => 'Gamis modern dan syari dengan desain terkini, nyaman dipakai sehari-hari maupun untuk acara spesial.',
                'image' => null,
            ],
            [
                'name' => 'Dress',
                'slug' => 'dress',
                'description' => 'Dress muslimah elegan yang cocok untuk berbagai kesempatan, dari kasual hingga formal.',
                'image' => null,
            ],
            [
                'name' => 'Setelan',
                'slug' => 'setelan',
                'description' => 'Setelan muslimah modern yang praktis dan stylish, siap membuat Anda tampil memukau.',
                'image' => null,
            ],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // Create Products
        $products = [
            [
                'category_id' => 1,
                'name' => 'Kerudung Satin Premium Rosegold',
                'slug' => 'kerudung-satin-premium-rosegold',
                'description' => 'Kerudung satin premium dengan warna rosegold yang mewah. Bahan halus dan lembut, tidak mudah kusut, cocok untuk acara formal maupun sehari-hari. Material satin grade A dengan finishing jahitan rapi.',
                'price' => 189000,
                'discount_price' => 149000,
                'is_active' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'Kerudung Voal Motif Bunga',
                'slug' => 'kerudung-voal-motif-bunga',
                'description' => 'Kerudung voal dengan motif bunga cantik yang anggun. Bahan adem dan ringan, ukuran jumbo 120x120cm. Warna tidak luntur dan mudah dibentuk.',
                'price' => 125000,
                'discount_price' => null,
                'is_active' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Gamis Syari Ceruti Babydoll Navy',
                'slug' => 'gamis-syari-ceruti-babydoll-navy',
                'description' => 'Gamis syari model babydoll dengan bahan ceruti premium warna navy. Dilengkapi dengan tali pinggang dan detail rempel yang cantik. Cocok untuk pengajian dan acara formal.',
                'price' => 385000,
                'discount_price' => 299000,
                'is_active' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Gamis Wolfis Polos Dusty Pink',
                'slug' => 'gamis-wolfis-polos-dusty-pink',
                'description' => 'Gamis wolfis polos warna dusty pink yang lembut. Bahan tebal namun tetap adem, jatuh sempurna di badan. Tersedia ukuran S-XXL. Cocok untuk daily wear.',
                'price' => 275000,
                'discount_price' => null,
                'is_active' => true,
            ],
            [
                'category_id' => 3,
                'name' => 'Dress Tunik Plisket Sage Green',
                'slug' => 'dress-tunik-plisket-sage-green',
                'description' => 'Dress tunik model plisket warna sage green yang sedang trend. Bahan premium crinkle airflow, ringan dan tidak panas. Model oversize yang nyaman.',
                'price' => 245000,
                'discount_price' => 199000,
                'is_active' => true,
            ],
            [
                'category_id' => 3,
                'name' => 'Dress Maxi Brukat Putih',
                'slug' => 'dress-maxi-brukat-putih',
                'description' => 'Dress maxi dengan detail brukat putih yang anggun dan mewah. Cocok untuk acara pernikahan, lamaran, atau acara formal lainnya. Full furing dan jahitan premium.',
                'price' => 450000,
                'discount_price' => 375000,
                'is_active' => true,
            ],
            [
                'category_id' => 4,
                'name' => 'Setelan Tunik Celana Palazzo Mocca',
                'slug' => 'setelan-tunik-celana-palazzo-mocca',
                'description' => 'Setelan tunik dengan celana palazzo warna mocca. Bahan linen premium yang adem dan tidak menerawang. Set lengkap yang praktis dan stylish.',
                'price' => 325000,
                'discount_price' => null,
                'is_active' => true,
            ],
            [
                'category_id' => 4,
                'name' => 'Setelan Blazer Rok Span Hitam',
                'slug' => 'setelan-blazer-rok-span-hitam',
                'description' => 'Setelan blazer dengan rok span hitam yang formal dan elegan. Cocok untuk muslimah profesional, meeting kantor, atau acara resmi. Bahan premium tidak mudah kusut.',
                'price' => 475000,
                'discount_price' => 399000,
                'is_active' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'Kerudung Pashmina Diamond Cream',
                'slug' => 'kerudung-pashmina-diamond-cream',
                'description' => 'Pashmina diamond italiano warna cream. Bahan mewah dengan kilauan halus, mudah dibentuk dan tidak licin. Ukuran 175x75cm, sangat versatile untuk berbagai gaya.',
                'price' => 165000,
                'discount_price' => 135000,
                'is_active' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Gamis Abaya Premium Hitam Bordir',
                'slug' => 'gamis-abaya-premium-hitam-bordir',
                'description' => 'Gamis abaya hitam premium dengan detail bordir emas yang mewah. Bahan jetblack grade A, jatuh sempurna. Cocok untuk umroh, haji, atau acara formal Islami.',
                'price' => 550000,
                'discount_price' => 465000,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
