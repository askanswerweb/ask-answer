<?php

namespace App\Traits\Models;

use App\Business\Utilities\Queries;
use App\Models\Media;
use Illuminate\Database\Eloquent\Collection;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property Collection|Media[] $images
 */
trait MediaTrait
{
    use InteractsWithMedia;

    public function images()
    {
        return $this->morphMany(config('media-library.media_model'), 'model')
            ->whereRaw(Queries::like('media.mime_type', 'image'));
    }
}
