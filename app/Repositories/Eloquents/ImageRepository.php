<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ImageRepositoryInterface;
use App\Models\Image;
use DB;

class ImageRepository implements ImageRepositoryInterface
{
    public function create($data, $place_id)
    {

        DB::beginTransaction();
        try {
            foreach ($data as $image) {
                $newImage = new Image;
                $newImage->link = $image;
                $newImage->review_id = $place_id;
                $newImage->save();
            }
        DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            
            return false;
        }
    }
}
