<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Business\Utilities\Files;
use App\Traits\Models\ModelTrait;
use Carbon\Carbon;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

/**
 * Class Media
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property string|null $uuid
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property string|null $mime_type
 * @property string $disk
 * @property string|null $conversions_disk
 * @property int $size
 * @property array $manipulations
 * @property array $custom_properties
 * @property array $generated_conversions
 * @property array $responsive_images
 * @property int|null $order_column
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Media extends BaseMedia
{
    use ModelTrait;

    protected $table = 'media';

    protected $casts = [
        'model_id' => 'int',
        'size' => 'int',
        'manipulations' => 'array',
        'custom_properties' => 'array',
        'generated_conversions' => 'array',
        'responsive_images' => 'array',
        'order_column' => 'int'
    ];

    protected $fillable = [
        'model_type',
        'model_id',
        'uuid',
        'collection_name',
        'name',
        'file_name',
        'mime_type',
        'disk',
        'conversions_disk',
        'size',
        'manipulations',
        'custom_properties',
        'generated_conversions',
        'responsive_images',
        'order_column'
    ];

    public function isImage(): bool
    {
        $type = explode('/', $this->mime_type);
        if (!count($type)) {
            return false;
        }

        return $type[0] == 'image';
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Media $media) {
            Files::removeImages($media->getPath());
        });
    }
}
