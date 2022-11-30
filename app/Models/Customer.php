<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function invoices() {
        return $this->hasMany(Invoice::class);
    }

    public function contact() {
        return $this->hasMany(Contact::class);
    }

    public function getNameAttribute($value)
    {
        return $value . 'test';
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value . 'postfix';;
    }
}