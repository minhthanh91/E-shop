<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\product;
class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
      $list=[
      ['Điện Thoại SamsungGalaxy Z Fold2 5G (12GB/256GB) - ĐÃ KÍCH HOẠT BẢO HÀNH ĐIỆN TỬ - Hàng Chính Hãng', 32743000, 'Samsung', 'Hai màn hình, trải nghiệm trong cùng một thiết bị',"/imgs/item1.jpg"],
      ['Điện Thoại Samsung Galaxy Note 20 Ultra (8GB/256GB) - Hàng Chính Hãng', 32743000, 'Samsung', 'Sự kết hợp của siêu phẩm',"/imgs/item2.jpg"],
      ['Điện Thoại Samsung Galaxy Z Fold 3 (256GB) - Hàng Chính Hãng', 41989000, 'Samsung', 'Sẵn sàng mở ra tiềm năng công nghệ mới',"/imgs/item3.jpg"],
      ['Điện Thoại Samsung Galaxy Z Flip 3 (128GB) - Hàng Chính Hãng', 22190000, 'Samsung', 'Thiết kế màn hình gập độc đáo',"/imgs/item4.jpg"],
      ['Điện thoại Xiaomi POCO X3 PRO - Hàng Chính Hãng', 5580000, 'Xiaomi', 'Thiết kế hiện đại, thời trang',"/imgs/item5.jpg"],
      ['Điện Thoại OnePlus Nord CE 5G (12GB/256G) - Hàng Chính Hãng', 7790000, 'OnePlus', 'Thách thức mọi tựa game',"/imgs/item6.jpg"],
      ['Smart Tivi QLED Samsung 4K 55 inch QA55Q60A Mới 2021', 19170000, 'Samsung', 'Rực Rỡ Sắc Màu, Bền Bỉ Dài Lâu Với Công Nghệ Quantum Dot Hiển Thị 100% Dải Sắc Màu',"/imgs/item7.jpg"],
      ['Smart Tivi QLED Samsung 4K 65 inch QA65Q70A Mới 2021', 24550000, 'Samsung', 'Nâng Tầm Những Khung Hình Game Tuyệt Đẹp',"/imgs/item8.jpg"],
      ['Smart Tivi QLED Samsung 4K 65 inch QA65Q7FNA', 28508000, 'Samsung', '',"/imgs/item9.jpg"],
      ['Smart Tivi Cong QLED Samsung 4K 55 inch QA55Q8CNA', 19960000, 'Samsung', '',"/imgs/item10.jpg"],
    ];

    for ($i=0; $i < count($list); $i++) { 
      $add=new product();
      $add['name']=$list[$i][0];
      $add['price']=$list[$i][1];
      $add['category']=$list[$i][2];
      $add['description']=$list[$i][3];
      $add['gallery']=$list[$i][4];
      $add->save();
    }
  }
}
