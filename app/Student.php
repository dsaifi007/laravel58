<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UserFee;
class Student extends Model
{
   protected $guarded = [];

   public function userFees()
   {
   	 return $this->hasMany("App\UserFee");
   }
}
