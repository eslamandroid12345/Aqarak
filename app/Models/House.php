<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class House extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =
        ['user_id',
        'add_title',
        'house_title',
        'villa',
        'description',
        'phone_1',
        'phone_2',
        'phone_3',
        'department',
        'title_type',
        'price',
        'room_number',
        'bathroom_number',
        'space',
        'date_day',
        'filename', 'status',

        ];

    protected $dates = ['deleted_at'];

    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }


    public function scopeSearch($query,Request $request){


            if($request->price != null){

                if($request->price <= 4900){

                    $query->whereBetween('price',[0,4900]);

                } elseif($request->price <= 9900){

                    $query->whereBetween('price',[5000,9900]);

                }elseif($request->price <= 49900){

                    $query->whereBetween('price',[10000,49900]);

                }elseif($request->price <= 99900){

                    $query->whereBetween('price',[50000,99900]);

                }

                elseif($request->price <= 490000){

                    $query->whereBetween('price',[100000,490000]);

                }


                elseif($request->price <= 990000){

                    $query->whereBetween('price',[500000,990000]);

                }

                elseif($request->price <= 4900000){

                    $query->whereBetween('price',[1000000,4900000]);

                }

                elseif($request->price <= 9900000){

                    $query->whereBetween('price',[5000000,9900000]);

                }

                elseif($request->price <= 49000000){

                    $query->whereBetween('price',[10000000,49000000]);

                }

                 elseif($request->price <= 49000000){

                    $query->whereBetween('price',[10000000,49000000]);

                }

                elseif($request->price <= 100000000){

                    $query->whereBetween('price',[50000000,100000000]);

                }


            }

            elseif($request->house_title != null){

                $query->where('house_title',$request->house_title);
            }

            elseif($request->add_title != null){

                $query->where('add_title','LIKE','%' . $request->add_title . '%');

            }elseif($request->villa != null){

                $query->where('villa','LIKE','%' . $request->villa . '%');

            }elseif($request->department != null){

                $query->where('department','LIKE','%' . $request->department . '%');
            }




    }


}


