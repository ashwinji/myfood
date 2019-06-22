<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appsetting extends Model
{
	/*
	* (1 (for Monday) through 7 (for Sunday))
	* 1 / 2 / 3
	* item_received_day / production_day / delivery_day
	*/
    protected $fillable = [
        'app_name', 'app_logo', 'email', 'address', 'mobilenum', 'seo_keyword', 'seo_description', 'google_analytics', 'po_number', 'item_received_day', 'production_day', 'delivery_day'
    ];
}
