<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcement_type_master';
	protected $fillable = ['ANNOUNCEMENT_ID','ANNOUNCEMENT_TYPE','FLAG'];
}
