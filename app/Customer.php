<?php
namespace Nimr_Publications;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{


      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'fname', 'level', 'sname', 'mname'
    ];
}