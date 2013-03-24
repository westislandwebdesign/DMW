<?php

class Part extends Basemodel
{
    public static $rules = array(
        'model'  => 'required',
        'prod_id'  => 'required',
        'category' => 'required',
        'price'  => 'required',
        'short_desc'  => 'required'
    );

//    public static $parts_bodies_stock = array();
//    public static $parts_fixed_bridges_stock = array();
//    public static $parts_trem_bridges_stock = array();
//    public static $parts_hardware_stock = array();
//    public static $parts_machine_heads_stock = array();
//    public static $parts_pickguards_stock = array();
//    public static $parts_pickups_stock = array();

    const CAT_NAME_BODY         = 'BODY';
    const CAT_NAME_FIXED_BRIDGE = 'FIXED_BRIDGE';
    const CAT_NAME_TREM_BRIDGE  = 'TREM_BRIDGE';
    const CAT_NAME_HARDWARE     = 'HARDWARE';
    const CAT_NAME_MACHINE_HEAD = 'MACHINE_HEAD';
    const CAT_NAME_NECK         = 'NECK';
    const CAT_NAME_PICKGUARD    = 'PICKGUARD';
    const CAT_NAME_PICKUP       = 'PICKUP';

}