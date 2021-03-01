<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class Product extends Model
{
    use Billable;
}
