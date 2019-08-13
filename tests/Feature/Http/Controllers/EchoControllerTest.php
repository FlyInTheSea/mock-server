<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 8/9/19
 * Time: 9:25 PM
 */

namespace Tests\Feature\Http\Controllers;


use Tests\NoAuthRequestTest;

class EchoControllerTest extends NoAuthRequestTest
{
    /**
     * response is [ 'echo'=>'echo']
     * @test
     */
    public function echo()
    {
        $uri = 'echo';

        $info = $this->json_get($uri);

        $this->assertTrue(
            [
                'echo' => 'echo',
            ] === $info
        );

    }
}
