<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'employees';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
    ];

    /**
     * company
     *
     * @return void
     */
    public function company()
    {
        return $this->hasOne('App\Models\Company', 'id', 'company_id');
    }
}
