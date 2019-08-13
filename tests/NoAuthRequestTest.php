<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 8/9/19
 * Time: 9:26 PM
 */

namespace Tests;


class NoAuthRequestTest extends TestCase
{
    public function json_get($relative_path, $data = [])
    {
        $str = $this
//            ->withHeader('token', $this->token)
            ->json(
                "GET",
                $relative_path,
                $data
            )->getContent();

        return json_decode($str, true);
    }
}
