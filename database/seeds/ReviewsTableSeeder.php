<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'submary' => 'Thưởng thức Cafe Cuối Ngõ',
                'place_id' => 1,
                'user_id' => 1,
                'content' => 'Nhận được challenge từ admin Lịch mà bối rối chưa biết viết gì, ngồi nhớ lại những lần mình từng viết để tìm chủ đề. Những content thành công cũng nhiều, thất bại cũng không ít. Suy ngẫm làm sao để Content chất thì tôi nhớ ra một điều: đó là cần tư duy trước khi làm content. ‘

                Tay nhanh hơn não’ là nguyên nhân của nhiều content thất bại. Thiết lập tư duy trước khi làm content giúp loại bỏ hơn 70% vấn đề, tư duy đúng giúp bạn đi trên con đường chiến thắng. Tư duy giúp Content của bạn viết ra là đã có tính chiến lược.
                
                Do đó chúng ta cần thiết lập tư duy trước, trong và sau khi làm content
                
                Tư duy trước khi làm content
                ✔️Chúng ta đang có gì ? sản phẩm của bạn / dịch vụ của bạn có cái gì khác biệt so với đối thủ, có lợi thế gì so với đối thủ không ? Nếu câu trả lời là có, thì content sẽ trở nên dễ dàng, chỉ cần mô tả sản phẩm của bạn thôi, là đã khiến khách ‘chú ý’ và ‘thòm thèm’. Nếu câu trả lời là không thì vấn đề trở nên phức tạp và khó hơn nhiều. Nếu sản phẩm không khác biệt thì hãy làm cho content của bạn khác biệt. Hãy học hỏi Cocacola, sản phẩm này không có gì mới qua bao nhiêu năm tháng, nhưng cách quảng cáo của nó thì luôn luôn mới và thú vị',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 4,
                'quality_rate' => 4,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Sống chậm ở Cafe cuối ngõ',
                'place_id' => 1,
                'user_id' => 1,
                'content' => 'Content cafe cuoi ngo',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 4,
                'quality_rate' => 4,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Checkin tại cư xá cafe',
                'place_id' => 2,
                'user_id' => 1,
                'content' => 'Content cafe cư xá',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 4,
                'quality_rate' => 4,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'cư xá cafe-Hẹn hò cuối tuần',
                'place_id' => 2,
                'user_id' => 1,
                'content' => 'Content cafe cư xá',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 4,
                'quality_rate' => 4,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Buffe Sen Việt,giá rẻ cho mọi nhà',
                'place_id' => 3,
                'user_id' => 1,
                'content' => 'Content buffer',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 4,
                'quality_rate' => 4,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Buffe Sen Việt,ăn lo thỏa thích',
                'place_id' => 3,
                'user_id' => 1,
                'content' => 'Content buffer',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 4,
                'quality_rate' => 4,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Ăn lẩu nhật bản tại Hà Nội',
                'place_id' => 4,
                'user_id' => 1,
                'content' => 'Content lẩu nhật bản',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 4,
                'quality_rate' => 4,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Ăn lẩu On-Yasai Shabu ',
                'place_id' => 4,
                'user_id' => 1,
                'content' => 'Content lẩu nhật bản',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 4,
                'quality_rate' => 4,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Xem King-Man tại rạp quốc gia',
                'place_id' => 5,
                'user_id' => 1,
                'content' => 'Content xem phim king man',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 4,
                'quality_rate' => 4,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Xem người sắt tại rạp quốc gia',
                'place_id' => 5,
                'user_id' => 1,
                'content' => 'Content xem phim người sắt',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 4,
                'quality_rate' => 4,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Xem người sắt tại CGV',
                'place_id' => 6,
                'user_id' => 1,
                'content' => 'Content xem phim người sắt',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 4,
                'quality_rate' => 4,
                'status' => '1', 
                'created_at' => new DateTime(),
            ], [
                'submary' => 'Xem Annable tại CGV',
                'place_id' => 6,
                'user_id' => 1,
                'content' => 'Content xem phim Annable',
                'timewrite' => '2017-12-13 08:00:00',
                'service_rate' => 4,
                'quality_rate' => 4,
                'status' => '1', 
                'created_at' => new DateTime(),
            ]
        ]);
    }
}
