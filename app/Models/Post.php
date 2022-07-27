<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    // protected $fillable = [
    //     'user_id',
    //     'judul_post',
    //     'nama_perusahaan',
    //     'alamat_perusahaan',
    //     'persyaratan',
    //     'deskripsi',
    //     'exerpt',
    //     'expired_at'
    // ];
    
    protected $guarded =  
    [
        'id',
    ];

   

    public function sluggable(): array
    {
        return[
            'slug'=>['source'=>'judul_post']
        ];
    }

    public function scopeFilter($query, array $filters)
    {
        // if(isset($filters['search'])? $filters['search'] : false )
        // {
        //     return $query->where('judul_post', 'like', '%' .$filters['search']. '%')
        //           ->orWhere('deskripsi', 'like', '%'.$filters['search'].'%')
        //           ->orWhere('persyaratan', 'like', '%'.$filters['search'].'%');
        // }

        $query->when(($filters['search'])?? false, function($query, $search){
            return $query->where('judul_post', 'like', '%' .$search. '%')
                  ->orWhere('deskripsi', 'like', '%'.$search.'%')
                  ->orWhere('persyaratan', 'like', '%'.$search.'%');
        });
    }
    
}

