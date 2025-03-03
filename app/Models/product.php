<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use SoftDeletes;
    protected $guarded=[];
    protected $date=['deleted_at'];
    protected $desc=['desc'];
    protected $append=['is_sale'];
    public function getIsSaleAttribute(){
        return $this->number>0&& $this->sale_price-$this->price!==0;
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function scopeSearch($quer,$sear){
        $quer->where('name','LIKE','%'.$sear.'%')->orwhere('desc','LIKE','%'.$sear.'%');
    }
    public function scopeCat($quer,$cat){
        $quer->where('category_id','LIKE','%'.$cat.'%');
    }
    public function scopeSorta($quer,$sor){
       switch ($sor) {
        case 'b':
            // dd($sor);
          $quer->orderBy('price','DESC');
            break;
        case 'k':
            $quer->orderBy('price');
            break;
        case 'p':
            # code...
            break;
        case 't':

            $quer->where('is_sale','=',1);
            break;

        default:
            # code...
            break;
       }
    }


}
