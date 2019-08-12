<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
					    	'id',
					    	'name',
					    	'price',
					    	'description',
					    	'produced_on',
					    	'category_id',
					    	'updated_at'
					  
				          ];

          public function category()
          {
          	return $this->belongsTo(Category::class);
          }
          
}
