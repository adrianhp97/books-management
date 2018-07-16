<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use Uuids;

    protected $table = 'books';
    protected $primaryKey = 'uuid';

    public $timestamps = true;
    public $incrementing = false;
}
