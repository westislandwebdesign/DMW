<?php

class Guitar extends Basemodel
{
    public static $rules = array(
        'model'  => 'required', // this is in the form of "guitar-model-1"
        'prod_id'  => 'required',
        'price'  => 'required',
        'short_desc'  => 'required'
    );
}