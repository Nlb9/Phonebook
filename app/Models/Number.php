<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;
    protected $table = 'phonenumber';
    protected $fillable = ['id', 'number', 'cont_id', 'type_id'];
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'cont_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
