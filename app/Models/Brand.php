<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Brand extends Model
{
    use HasFactory;
    use Sortable;

    public function models(){
        return $this->hasMany(Model::class);
    }
/**
 * Відредагувати все, звіритись в таблицею
 */
    protected $fillable = [
        'Make_ID',
        'Make_Name'
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
