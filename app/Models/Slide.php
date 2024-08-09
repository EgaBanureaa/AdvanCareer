<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slide extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'image',];

    protected static function boot()
    {
        parent::boot();
        static::updating(function($model){
            if($model->isDirty('image') && ($model->getOriginal('image') !==null)){
                Storage::disk('public')->delete($model->getOriginal('image'));
            }
        });
    }
}
