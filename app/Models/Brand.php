<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    protected static function booted()
    {
        static::saving(function ($obj){
            $obj->slug = str()->slug($obj->name);
        });
    }

    protected function products()
    {
        return $this->hasMany(Product::class)
            ->orderBy('id','desc');
    }

    public function getName()
    {
        return $this->name;
    }

    public function getImage()
    {
        return $this->image ? Storage::url('b/' . $this->image) : asset('img/brand.jpg');
    }
}
