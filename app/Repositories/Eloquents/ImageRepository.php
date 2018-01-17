<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ImageRepositoryInterface;
use App\Models\Image;
use DB;

class ImageRepository implements ImageRepositoryInterface
{
    public function create($data, $placeId)
    {
        DB::beginTransaction();
        try {
            foreach ($data as $image) {
                $newImage = new Image;
                $newImage->link = $image;
                $newImage->review_id = $placeId;
                $newImage->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            
            return false;
        }
    }

    public function delete($id)
    {
        return Image::destroy($id);
    }

    public function getFirst($review_id)
    {
        return Image::where('review_id', $review_id)->first();
    }
}
