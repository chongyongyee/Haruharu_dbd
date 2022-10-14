<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    protected $table ='expenses';
    protected $primaryKey = 'expensesId';

    protected $fillable =[
        'expensesName',
        'cost',
        'date',
    ];
}
