<?php

class Basemodel extends Eloquent 
{
    public static function validate($data) {

        // BAD OOP!!: base class is accessing derived class' static $rules
        return Validator::make($data, static::$rules);
    }

}