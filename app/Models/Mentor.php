<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $table = "cp_mentors";
    protected $primaryKey = "mentor_srl";
    protected $guarded = [];
    const CREATED_AT = 'regdate';
    const UPDATED_AT = null;





}
