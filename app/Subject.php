<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function childrens()
    {
      return $this->belongsToMany(Subject::class, 'parent_subject', 'subject_id', 'parent_id');
    }
}
