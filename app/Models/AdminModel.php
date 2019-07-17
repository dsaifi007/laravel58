<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Authenticatable
{
	//protected $fillable = ['email', 'password'];
    public function xyz()
    {
    	echo "xyz function";
    }
}
