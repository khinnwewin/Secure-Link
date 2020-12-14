<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class One extends Model
{
    //
    protected $fillable = [
        'title', 'article_id'
    ];
    public function article()
    {
    	return $this->belongsTo('App\Model\Article');
    }
}
