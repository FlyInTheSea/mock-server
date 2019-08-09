<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 11/15/18
 * Time: 3:10 PM
 */

namespace Tests;

use App\Models\AuthAppToken;
use App\Models\PlatformToken;

class PlatformApiTest extends AdminApiTest
{
    protected $prefix = 'platform/';

    public function authenticated_get($data = [])
    {
        $token = PlatformToken::where([
            'status'        => 1,
            'admin_user_id' => 1,
        ])->first()->token;

        return $resource = $this
            ->withHeader('token', $token)
            ->json("GET", $this->getUri(), $data);
    }


    public function authenticated_post($data = [])
    {
        $token = AuthAppToken::where([
            'status'         => 1,
            'admin_user_id' => 1,
        ])->first()->token;
        return $resource = $this
            ->withHeader('token', $token)
            ->json("POST", $this->getUri(), $data);
    }


    //todo
    public function authenticated_post_with_company($data = [], $user = null)
    {
        $token = AuthAppToken::where([
            'status'         => 1,
            'admin_user_id' => 1,
        ])->first()->token;
        return $resource = $this
            ->withHeader('token', $token)
            ->json("POST", $this->getUri(),
                array_merge($data, ['company_id' => 1])
            );
    }

}
