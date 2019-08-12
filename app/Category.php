<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //use SoftDeletes;


    protected $table = 'categories';

    protected $primaryKey = 'id';
    protected $fillable = [

    						'id',
					    	'name',
					    	'descriptions',
					    	'created_at',
					    	'produced_on',
					    	'category_id',
					    	'updated_at',
					    	'deleted_at'
    	];

    	public function products()
    	{
    		return $this->hasMany(Product::class);
    	}
}
