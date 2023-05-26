<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ReviewImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_id',
        'photo_path',
        'photo_name',
    ];

    protected $appends = [
        'photo_url',
    ];

    public function getPhotoUrlAttribute(): ?string
    {
        if (empty($this->getPhotoPath())) {
            return null;
        }
        return Storage::url($this->getPhotoPath());
    }

    public function getPhotoPath(): ?string
    {
        return $this->photo_path;
    }

    public function setPhotoPath(?string $photoPath)
    {
        $this->photo_path = $photoPath;
    }

    public function setPhotoName(?string $photoName)
    {
        $this->photo_name = $photoName;
    }
}
