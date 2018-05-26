<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
            [
                'name' => 'Đại học giao thông',
                'add' => 'Ngõ 79 Đường Cầu Giấy',
                'dist_id' => 1,
                'image' => 'cafe-cuoi-ngo.jpg',
                'open_hour' => '08:00:00',
                'close_hour' => '16:00:00',
                'range' => '10,000 - 200,000',
                'avg_service_rate' => 8,
                'avg_quality_rate' => 8,
                'total_rate' => 2,
                'status' => '1',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Cafe Cư Xá',
                'add' => 'Tầng 2 A11 Tập thể Khương Thượng, Trung Tự, Hà Nội',
                'dist_id' => 3,
                'image' => 'cu-xa.jpg',
                'open_hour' => '08:00:00',
                'close_hour' => '16:00:00',
                'range' => '10,000 - 200,000',
                'avg_service_rate' => 8,
                'avg_quality_rate' =>8,
                'total_rate' => 2,
                'status' => '1',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Buffet Sen Việt 160 Món Cao Cấp',
                'add' => '684 Minh Khai, Quận Hai Bà Trưng, Hà Nội',
                'dist_id' => 3,
                'image' => 'bufetsenviet.jpg',
                'open_hour' => '08:00:00',
                'close_hour' => '16:00:00',
                'range' => '10,000 - 200,000',
                'avg_service_rate' => 8,
                'avg_quality_rate' => 8,
                'total_rate' => 2,
                'status' => '1',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Buffet Lẩu On-Yasai Shabu Shabu Việt Nam',
                'add' => ' 72 Nguyễn Trãi, Thanh Xuân, HN',
                'dist_id' => 5,
                'image' => 'buffet-shabu.jpg',
                'open_hour' => '08:00:00',
                'close_hour' => '16:00:00',
                'range' => '10,000 - 200,000',
                'avg_service_rate' => 8,
                'avg_quality_rate' => 8,
                'total_rate' => 2,
                'status' => '1',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Trung Tâm Chiếu Phim Quốc Gia',
                'add' => '87 Láng Hạ, Thành Công, Hà Nội',
                'dist_id' => 4,
                'image' => 'trungtamchieuphim.jpg',
                'open_hour' => '08:00:00',
                'close_hour' => '22:00:00',
                'range' => '10,000 - 200,000',
                'avg_service_rate' => 8,
                'avg_quality_rate' => 8,
                'total_rate' => 2,
                'status' => '1',
                'created_at' => new DateTime(),
            ], [
                'name' => 'CGV Vincom Nguyen Chi Thanh',
                'add' => '56 Nguyễn Chí Thanh, Láng Thượng, Hà Nội',
                'dist_id' => 1,
                'image' => 'cgv-vincom-nguyen-chi-thanh.jpg',
                'open_hour' => '08:00:00',
                'close_hour' => '22:00:00',
                'range' => '10,000 - 200,000',
                'avg_service_rate' => 8,
                'avg_quality_rate' => 8,
                'total_rate' => 2,
                'status' => '1',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Vườn Hoa Bãi Đá Sông Hồng',
                'add' => 'Nhật Tân, Tây Hồ, Hà Nội',
                'dist_id' => 4,
                'image' => 'vuonghoanhattan.jpg',
                'open_hour' => '08:00:00',
                'close_hour' => '22:00:00',
                'range' => '10,000 - 20,0000',
                'avg_service_rate' => 8,
                'avg_quality_rate' => 8,
                'total_rate' => 2,
                'status' => '1',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Cầu Long Biên',
                'add' => 'Cầu Long Biên',
                'dist_id' => 7,
                'image' => 'cau_long_bien_zing.jpg',
                'open_hour' => '00:00:00',
                'close_hour' => '23:59:00',
                'range' => '10,000 - 20,0000',
                'avg_service_rate' => 8,
                'avg_quality_rate' => 8,
                'total_rate' => 2,
                'status' => '1',
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
