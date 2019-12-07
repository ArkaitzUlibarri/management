<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContracType extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public static $rules = [
        'code' => 'required|string|unique:contract_types,code|max:3',
        'name' => 'required|string|max:255',
        'working_day' => 'required|string',
        'characteristic_1' => 'nullable|string',
        'characteristic_2' => 'nullable|string',
        'holidays' => 'nullable|numeric',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'code', 'name', 'working_day', 'characteristic_1', 'characteristic_2', 'holidays'
    ];
}
