<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
//    use HasFactory;
        use SoftDeletes;
    protected $table = 'categories';


    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function createCategory($nameCategory){
        \DB::table($this->table)->insert((
            [
                'name' => $nameCategory,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]
        ));
    }
    public function selectAllCategoryWithPagination($number){
        return \DB::table($this->table)->select((['id', 'name']))->paginate($number);
        // перепроверить array
    }

    public function selectCategoryWithProducts($id){
        $return['category'] = Category::findOrFail($id);
        $return['products'] = $return['category']->products()->get();
        \Debugbar::addMessage($return);
        return $return;
    }
    public function deleteCategory($id){
        \DB::table($this->getTable())->delete($id);
        return 0;
    }
}
