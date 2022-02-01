<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Auto extends Model
{
    use HasFactory;
    use Sortable;


    protected $fillable = [
        'id',
        'name',
        'gos_nomer',
        'color',
        'vin',
        'brand',
        'model',
        'year'
    ];

    public $sortable = [
        'id',
        'name',
        'gos_nomer',
        'color',
        'vin',
        'brand',
        'model',
        'year'
    ];
}
