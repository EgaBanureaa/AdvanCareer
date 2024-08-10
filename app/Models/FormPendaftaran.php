<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormPendaftaran extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'email', 'no_telp', 'loker_id', 'cv'];

    protected static function boot()
    {
        parent::boot();
        static::updating(function($model){
            if($model->isDirty('cv') && ($model->getOriginal('cv') !==null)){
                Storage::disk('public')->delete($model->getOriginal('cv'));
            }
        });
    }

    public function loker()
    {
        return $this->belongsTo(Loker::class);
    }

}
