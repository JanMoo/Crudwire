<?php
namespace JanMoo\Crudwire;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model

{

    public $timestamps = false;

    protected $table = 'contacts';

    protected $fillable = ['name','phone'];

}
