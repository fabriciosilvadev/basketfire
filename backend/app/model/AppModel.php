<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
  protected $table = 'user';
}

class Point extends Eloquent
{
  protected $table = 'point';
}

class Token extends Eloquent
{
  protected $table = 'token';
}



