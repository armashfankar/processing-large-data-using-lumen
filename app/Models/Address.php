<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
    */
    protected $guarded = ['id'];

    /**
     * Store a newly created resource in storage.
     *
     * @param Pincode $pincode 
     * @param Row's Data $columns
     * @return true
     *      
    */
    public function create($pincode,$columns)
    {
        $address = new Address;
        $address->officename = $columns[0];
        $address->pincode = $pincode;
        $address->officeType = $columns[2];
        $address->Deliverystatus = $columns[3];
        $address->divisionname = $columns[4];
        $address->regionname = $columns[5];
        $address->circlename = $columns[6];
        $address->Taluk = $columns[7];
        $address->Districtname = $columns[8];
        $address->statename = $columns[9];
        $address->save();

        return true;
    }
}
