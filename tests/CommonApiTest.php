<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 11/15/18
 * Time: 3:10 PM
 */

namespace Tests;


use App\Exceptions\CustomValidationException;

class CommonApiTest extends TestCase
{
    protected $prefix = '';

    public function authenticated_get($data = [])
    {
        return $resource = $this
            ->withHeader('token', '123465')
            ->json("GET", $this->getUri(), $data);
    }

    public function not_authencated_get($data = [])
    {
        return $resource = $this
            ->json("GET", $this->getUri(), $data);
    }

    public function authenticated_post($data = [])
    {
        return $resource = $this
            ->withHeader('token', '123465')
            ->json("POST", $this->getUri(), $data);
    }


    //todo
    public function authenticated_post_with_company($data = [], $user = null)
    {
        return $resource = $this
            ->withHeader('token', '123465')
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