<?php
/**
 * Created by PhpStorm.
 * User: kfaulhaber
 * Date: 29/01/2019
 * Time: 20:56
 */

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testRegister(){

        $harry = static::createClient();
        $sally = static::createClient();

        $harry->insulate();
        $sally->insulate();

        $harry->request('POST', '/');
        $sally->request('POST', '/');

        $harryResponse = $harry->getResponse();
        $sallyResponse = $sally->getResponse();

        $this->assertEquals(200, $harryResponse->getStatusCode());
        $this->assertEquals(400, $sallyResponse->getStatusCode());

        $this->assertContains('User custom message should appear', $sallyResponse->getContent());

    }
}