<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Category;
use User;
class Book extends Model
{
    public function catrgory()
    {
      return $this->belongsTo("App\Category");
    }
    
    public function user()
    {
      return $this->belongsTo("App\User");
    }
}
