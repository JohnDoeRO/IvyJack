<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * employees
     *
     * @return void
     */
    public function employees(){
        return $this->hasMany('App\Models\Employee', 'company_id','id');
    }
}
