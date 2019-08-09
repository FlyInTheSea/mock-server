<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 11/15/18
 * Time: 3:10 PM
 */

namespace Tests;


use App\Exceptions\CustomValidationException;
use App\Models\AuthAdminToken;

class AdminApiTest extends TestCase
{
    protected $prefix = 'admin/';

    public function authenticated_get($data = [])
    {
        $token = AuthAdminToken::where([
            'status'         => 1,
            'admin_user_id' =>3, 
        ])->latest()->first()->token;

        return $resource = $this
            ->withHeader('token', $token)
            ->json("GET", $this->getUri(), $data);
    }

    public function authenticated_post($data = [])
    {
        $token = AuthAdminToken::where([
            'status'         => 1,
            'admin_user_id' => 1,
        ])->latest()->first()->token;
        return $resource = $this
            ->withHeader('token', $token)
            ->json("POST", $this->getUri(), $data);
    }


    //todo
    public function authenticated_post_with_company($data = [], $user = null)
    {
        $token = AuthAdminToken::where([
            'status'         => 1,
            'admin_user_id' => 1,
        ])->first()->token;
        return $resource = $this
            ->withHeader('token', $token)
            ->json("POST", $this->getUri(),
                array_merge($data, ['company_id' => 1])
            );
    }

    public function getUri()
    {
        if (empty($this->uri)) {
            throw new CustomValidationException('没有设置 uri');
        }

        return $this->prefix . $this->uri;
    }
}