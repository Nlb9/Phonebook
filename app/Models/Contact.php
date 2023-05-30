<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = ['id', 'name', 'birthday', 'user_id'];
    protected $dates = ['birthday'];
    protected $primaryKey = 'id';

    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    public function getBirthday() {
        return (new Carbon( $this->birthday))->format('d.m.Y');
    }
}
