<?php
namespace App\Traits\Users;

use App\Models\User;
use App\Traits\Common\CommonTrait;

trait UserBaseTrait{
    use CommonTrait;
    protected function usersByUsername($username) : string{
        try{
            $total = User::where('username', '=', $username)->count();
            if($total == 0) return '';
            else return $total;
        }catch (\Exception $e){ return ''; }
    }
    public function getSlug($slug): string{
        $string = $this->generateSlug($slug);

        return ($string . ($this->usersByUsername($string)));
    }
}
