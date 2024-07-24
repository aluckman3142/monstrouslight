<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;

    protected $file;

    protected $fillable = [
        'disk',
        'fileable_type',
        'fileable_id',
        'url',
        'path',
        'original_file_name',
        'size',
        'mime_type',
        'type'
    ];

    public function __construct($file = null, $disk = 'public')
    {
        if ($file) {
            $this->setFile($file);
        }

        $this->disk = $disk;
    }

    public function setHttpFile($file)
    {
        $this->file = $file;
        $this->original_file_name = $file->getClientOriginalName();
        $this->hash = md5_file($file->getRealPath());
        $this->mime_type = $file->getMimeType();
        $this->extension = $file->extension();
        $this->size = $file->getSize();

    }

    public function save($options = array())
    {
        if ($this->file) {
            $this->path = $this->file->storeAs('files', $this->hash . '.' . $this->extension, $this->disk);
            $this->url = Storage::disk($this->disk)->url($this->path);
        }
        return parent::save($options);
    }

    public function delete()
    {
        $count = self::wherePath($this->path)->count();
        if ($count == 1) {
            Storage::delete($this->path);
        }
        return parent::delete();
    }

    public function fileable()
    {
        return $this->morphTo();
    }

    public function getUrlAttribute()
    {
        return Storage::disk($this->disk)->url($this->path);
    }
}
