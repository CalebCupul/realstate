<?php

namespace App\Models;

use App\Enums\EnumRoles;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole implements Auditable
{

    use \OwenIt\Auditing\Auditable;

/* -------------------------------------------------------------------------- */
/*                                 LaraTables                                 */
/* -------------------------------------------------------------------------- */

    /**
     * @param  $query
     * @return mixed
     */
    public static function laratablesQueryConditions($query)
    {
        return $query->where('name', '<>', EnumRoles::SUDO);
    }

    /**
     * @param $role
     */
    public static function laratablesCustomAction($role)
    {
        return view('admin.roles.includes.index_action', compact('role'))->render();
    }

    /**
     * @param $role
     */
    public static function laratablesCustomName($role)
    {
        return view('admin.roles.includes.index_name', compact('role'))->render();
    }

    /**
     * Additional columns to be loaded for datatables.
     *
     * @return array
     */
    public static function laratablesAdditionalColumns()
    {
        return ['name'];
    }
}
