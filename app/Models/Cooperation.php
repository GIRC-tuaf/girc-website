<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Cooperation extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'link_website',
        'description',
    ];

    protected $table = 'cooperations';

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('lg')
            ->crop(1020, 603)
            ->sharpen(5)
            ->format('jpg')
            ->performOnCollections('album_cooperation');

        $this->addMediaConversion('md')
            ->crop(541, 320)
            ->sharpen(5)
            ->format('jpg')
            ->performOnCollections('album_cooperation');

        $this->addMediaConversion('thumb')
            ->crop(368, 276)
            ->sharpen(10)
            ->format('jpg')
            ->performOnCollections('album_cooperation');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('album_cooperation')
            ->singleFile()
            ->useDisk('album');
    }

    protected function createdAtVi(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->created_at)->format('d.m.Y h:i'),
        );
    }

    protected function updatedAtVi(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->updated_at)->format('d.m.Y h:i'),
        );
    }
}
