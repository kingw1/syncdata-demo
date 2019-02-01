<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['id', 'title', 'content', 'is_sync', 'created_at', 'updated_at', 'sync_at'];
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
}
