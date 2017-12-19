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
                'name' => 'Cafe Cuối ngõ',
                'add' => 'Ngõ 79 Đường Cầu Giấy',
                'dist_id' => 1,
                'image' => 'cafe-cuoingo.png',
                'open-hour' => '08:00:00',
                'close-hour' => '16:00:00',
                'range' => 'rangdefault',
                'avg_service_rate' => 5,
                'avg_quality_rate' => 5,
                'total_rate' => 3,
                'status' => '1',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Cafe Cư Xá',
                'add' => 'Tầng 2 A11 Tập thể Khương Thượng, Trung Tự, Hà Nội',
                'dist_id' => 3,
                'image' => 'cafe-cuxa.png',
                'open-hour' => '08:00:00',
                'close-hour' => '16:00:00',
                'range' => 'rangdefault',
                'avg_service_rate' => 5,
                'avg_quality_rate' => 5,
                'total_rate' => 3,
                'status' => '1',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Buffet Sen Việt 160 Món Cao Cấp',
                'add' => '684 Minh Khai, Quận Hai Bà Trưng, Hà Nội',
                'dist_id' => 3,
                'image' => 'buffet-senviet.png',
                'open-hour' => '08:00:00',
                'close-hour' => '16:00:00',
                'range' => 'rangdefault',
                'avg_service_rate' => 5,
                'avg_quality_rate' => 5,
                'total_rate' => 3,
                'status' => '1',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Buffet Lẩu On-Yasai Shabu Shabu Việt Nam',
                'add' => ' 72 Nguyễn Trãi, Thanh Xuân, HN',
                'dist_id' => 5,
                'image' => 'buffet-shabu.png',
                'open-hour' => '08:00:00',
                'close-hour' => '16:00:00',
                'range' => 'rangdefault',
                'avg_service_rate' => 5,
                'avg_quality_rate' => 5,
                'total_rate' => 3,
                'status' => '1',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Trung Tâm Chiếu Phim Quốc Gia',
                'add' => '87 Láng Hạ, Thành Công, Hà Nội',
                'dist_id' => 4,
                'image' => 'rapquocgia.png',
                'open-hour' => '08:00:00',
                'close-hour' => '22:00:00',
                'range' => 'rangdefault',
                'avg_service_rate' => 5,
                'avg_quality_rate' => 5,
                'total_rate' => 3,
                'status' => '1',
                'created_at' => new DateTime(),
            ], [
                'name' => 'CGV Vincom Nguyen Chi Thanh',
                'add' => '56 Nguyễn Chí Thanh, Láng Thượng, Hà Nội',
                'dist_id' => 1,
                'image' => 'rapcgv.png',
                'open-hour' => '08:00:00',
                'close-hour' => '22:00:00',
                'range' => 'rangdefault',
                'avg_service_rate' => 5,
                'avg_quality_rate' => 5,
                'total_rate' => 3,
                'status' => '1',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Vườn Hoa Bãi Đá Sông Hồng',
                'add' => 'Nhật Tân, Tây Hồ, Hà Nội',
                'dist_id' => 4,
                'image' => 'vuonghoanhattan.png',
                'open-hour' => '08:00:00',
                'close-hour' => '22:00:00',
                'range' => 'rangdefault',
                'avg_service_rate' => 5,
                'avg_quality_rate' => 5,
                'total_rate' => 3,
                'status' => '1',
                'created_at' => new DateTime(),
            ], [
                'name' => 'Cầu Long Biên',
                'add' => 'Cầu Long Biên',
                'dist_id' => 7,
                'image' => 'vuonghoanhattan.png',
                'open-hour' => '00:00:00',
                'close-hour' => '23:59:00',
                'range' => 'rangdefault',
                'avg_service_rate' => 5,
                'avg_quality_rate' => 5,
                'total_rate' => 3,
                'status' => '1',
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
