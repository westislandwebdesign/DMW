<?php

class Basemodel extends Eloquent 
{
    // let Laravel update the timestamps in the table for us
    public static $timestamps = true;

    public static function validate($data) {

        // BAD OOP!!: base class is accessing derived class' static $rules
        return Validator::make($data, static::$rules);
    }

}