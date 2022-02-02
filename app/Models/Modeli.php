<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Modeli extends Model
{
    use HasFactory;
    use Sortable;
    
    
    protected $fillable = [
        'id',
        'Make_ID',
        'Make_Name',
        'Model_ID',
        'Model_Name'
    ];  


    protected $sortable = [
        'id',
        'Make_ID',
        'Make_Name',
        'Model_ID',
        'Model_Name'
    ];
}
