<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    // If you are using a database table, define it here:
    protected $table            = 'admins'; 
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'email', 'password']; // Fields that can be queried/saved

    /**
     * Optional: Temporary method if you aren't using a database yet
     * and want to log in strictly with hardcoded credentials.
     */
    public function getHardcodedAdmin($email)
    {
        if ($email === 'admin@tau.edu.ph') {
            return [
                'id'       => 1,
                'name'     => 'TAU Admin',
                'email'    => 'admin@tau.edu.ph',
                // This is the hashed version of 'admin123' required by password_verify()
                'password' => password_hash('admin123', PASSWORD_DEFAULT) 
            ];
        }
        return null;
    }
}