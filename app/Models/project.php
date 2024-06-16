<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Technology;


class project extends Model
{
    use HasFactory;
    protected $fillable = ['title','img','content', 'slug' , 'category_id'];
    public static function generateSlug($title){
        $slugBase = Str::slug(trim($title), '-');
        $slugs = \App\Models\project::orderBy('slug')->pluck('slug')->toArray();
        $num = 1;
        $slugNumbers = [];
        
        foreach ($slugs as $slug) {
            if (preg_match('/-(\d+)$/', $slug, $matches)) {
                $slugNumbers[] = intval($matches[1]);
            }
        }

        while (in_array($num, $slugNumbers)) {
            $num++;
        }

        $slug = $slugBase . '-' . $num;

        if(preg_match('/-(\d+)$/', $slugBase, $matches)){
            if(!in_array($matches[1],$slugNumbers)){
                $slug=$slugBase;   
            }
        }
        return $slug;
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}


