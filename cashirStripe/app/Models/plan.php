<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    // use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'stripe_plan',
        'cost',
        'description'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

// <div class="contactParentDiv container">
// <div class="contactChildDiv">
// <div class="address_info_div">
// <div class="open_info open_info_outer">
// <div class="open_info_child_div">
// <div class="white_div">
// <div class="time">
// <div class="more_info"><b>Contact Emm-Bee for more information on our motorhomes and services.</b></div>
// <div class="yellow_border"></div>
// <div class="address_info_div">
// <div class="address_info">

// <div class="address_div addr_div">
// <div style="background-color: white" class="add_icon ">
// <img src="https://img.icons8.com/ultraviolet/40/000000/address.png"/>
// </div>
// <div class="content">Prettywood, Bury, Greater Manchester, BL9-7HX</div>
// </div>
// <div  class="phone_div addr_div">
// <div style="background-color: white" class="add_icon ">
// <img src="https://img.icons8.com/ultraviolet/40/000000/phone.png"/>
// </div>
// <div class="content"><a href="tel:0161 797 2988">0161 797 2988</a></div>
// </div>

// <div class="email_div addr_div">
// <div style="background-color: white" class="add_icon ">
// <img src="https://img.icons8.com/fluent/48/000000/mail.png"/>
// </div>
// <div class="content"><a href="mailto:info@emm-bee.co.uk">info@emm-bee.co.uk</a></div>
// </div>


// </div>
// <div class="open_info">
// <div class="open_info_child_div">
// <div class="opening_hour_div">
// <div class="hr_icon"></div>
// <div class="content">Opening Hours</div>
// </div>
// <div class="yellow_div">

// MOTORHOME SALES (<a href="mailto:sales@emm-bee.co.uk">sales@emm-bee.co.uk</a>)

// </div>
// <div class="white_div">
// <div class="mon_fri_div">
// <div class="day">Monday - Friday</div>
// <div class="time">09.00 - 17.00</div>
// </div>
// <div class="sat_sun_div">
// <div class="day">Saturday &amp; Sunday</div>
// <div class="time">10.00 - 17.00</div>
// </div>
// </div>
// <div class="yellow_div">

// SERVICE/AFTERSALES (<a href="mailto:service@emm-bee.co.uk">service@emm-bee.co.uk</a>)

// </div>
// <div class="white_div">
// <div class="mon_fri_div">
// <div class="day">Monday - Friday</div>
// <div class="time">09.00 - 17.00</div>
// </div>
// </div>
// <div class="yellow_div">

// PARTS/SHOP (<a href="mailto:parts@emm-bee.co.uk">parts@emm-bee.co.uk</a>)

// </div>
// <div class="white_div">
// <div class="mon_fri_div">
// <div class="day">Monday - Friday</div>
// <div class="time">09.00 - 17.00</div>
// </div>
// </div>
// </div>
// </div>
// </div>
// </div>
// </div>
// </div>
// </div>
// </div>
// </div>
// </div>
// </div>