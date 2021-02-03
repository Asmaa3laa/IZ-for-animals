<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\TagTranslation;


class Tag extends Model implements TranslatableContract
{
    use SoftDeletes;
    use Translatable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "tags";

    protected $fillable = ['id'];

    protected $with = ['translations'];

    public $translatedAttributes = ['name'];

    public function blog()
    {
        return $this->belongsToMany('App\Blog');
    }
}
