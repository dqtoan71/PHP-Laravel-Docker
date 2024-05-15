<?php

namespace App\Models;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roles extends Role
{
    use SoftDeletes;
}
