<?php
/**
 * API Requests using the HTTP protocol through the Curl library.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2016 - 2017 JST PHP Framework
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/PHP-Curl
 * @since      1.1.3
 */

namespace Josantonius\Curl\Tests;

use Josantonius\Curl\Curl,
    PHPUnit\Framework\TestCase;

/**
 * Tests class for Curl library.
 *
 * @since 1.1.3
 */
final class CurlTest extends TestCase { 

    /**
     * Send GET request and obtain response as array.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testGetRequestArray() {
        
        $this->assertInternalType('array',

            Curl::request('https://graph.facebook.com/zuck')
        );
    }

    /**
     * Send GET request and obtain response as object.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testGetRequestObject() {
        
        $this->assertInternalType('object',
            
            Curl::request('https://graph.facebook.com/zuck', false, 'object')
        );
    }

    /**
     * Send GET request with params and obtain response as array.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testGetRequestWithParamsArray() {
        
        $data = [

            'timeout' => 10,
            'referer' => 'http://site.com'
        ];

        $this->assertInternalType('array',
            
            Curl::request('https://graph.facebook.com/zuck', $data)
        );
    }

    /**
     * Send GET request with params and obtain response as object.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testGetRequestWithParamsObject() {
        
        $data = [

            'timeout' => 10,
            'referer' => 'http://site.com'
        ];

        $this->assertInternalType('object',
            
            Curl::request('https://graph.facebook.com/zuck', $data, 'object')
        );
    }

    /**
     * Send wrong GET request.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testGetRequestError() {
        
        $this->assertFalse(Curl::request('https://xxx.xxx.com'));
    }

    /**
     * Send POST request and obtain response as array.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testPostRequestArray() {

        $data = [

            'type'      => 'post',
            'data'      => array('user' => '123456', 'password' => 'xxxxx'),
            'timeout'   => 10,
            'referer'   => 'http://'.$_SERVER['HTTP_HOST'],
            'headers'   => [

                'Content-Type:application/json', 
                'Authorization:0kdm3hzmb4h3cf'
            ]
        ];
        
        $this->assertInternalType('array',

            Curl::request('https://graph.facebook.com/zuck', $data)
        );
    }

    /**
     * Send POST request and obtain response as object.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testPostRequestObject() {

        $data = [

            'type'    => 'post',
            'data'    => array('user' => '123456', 'password' => 'xxxxx'),
            'timeout' => 10,
            'referer' => 'http://'.$_SERVER['HTTP_HOST'],
            'headers' => [

                'Content-Type:application/json', 
                'Authorization:0kdm3hzmb4h3cf'
            ]
        ];
        
        $this->assertInternalType('object',

            Curl::request('https://graph.facebook.com/zuck', $data, 'object')
        );
    }

    /**
     * Send wrong POST request.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testPostRequestError() {

        $data = [

            'type'      => 'post',
            'data'      => array('user' => '123456', 'password' => 'xxxxx'),
            'timeout'   => 10,
            'referer'   => 'http://'.$_SERVER['HTTP_HOST'],
            'headers'   => [

                'Content-Type:application/json', 
                'Authorization:0kdm3hzmb4h3cf'
            ]
        ];
        
        $this->assertFalse(Curl::request('https://xxx.xxx.com'), $data);
    }

    /**
     * Send PUT request and obtain response as array.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testPutRequestArray() {

        $data = [

            'type'    => 'put',
            'data'    => array('email' => 'new@email.com'),
            'timeout' => 30,
            'referer' => 'http://'.$_SERVER['HTTP_HOST'],
            'headers' => [

                'Content-Type:application/json', 
                'Authorization:0kdm3hzmb4h3cf'
            ]
        ];
        
        $this->assertInternalType('array',

            Curl::request('https://graph.facebook.com/zuck', $data)
        );
    }

    /**
     * Send PUT request and obtain response as object.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testPutRequestObject() {

        $data = [

            'type'    => 'put',
            'data'    => array('email' => 'new@email.com'),
            'timeout' => 30,
            'referer' => 'http://'.$_SERVER['HTTP_HOST'],
            'headers' => [

                'Content-Type:application/json', 
                'Authorization:0kdm3hzmb4h3cf'
            ]
        ];
        
        $this->assertInternalType('object',

            Curl::request('https://graph.facebook.com/zuck', $data, 'object')
        );
    }

    /**
     * Send wrong PUT request.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testPutRequestError() {

        $data = [

            'type'    => 'put',
            'data'    => array('user' => '123456', 'password' => 'xxxxx'),
            'timeout' => 10,
            'referer' => 'http://'.$_SERVER['HTTP_HOST'],
            'headers' => [

                'Content-Type:application/json', 
                'Authorization:0kdm3hzmb4h3cf'
            ]
        ];
        
        $this->assertFalse(Curl::request('https://xxx.xxx.com'), $data);
    }

    /**
     * Send DELETE request and obtain response as array.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testDeleteRequestArray() {

        $data = [

            'type'      => 'delete',
            'data'      => ['userId' => 10],
            'timeout'   => 30,
            'referer'   => 'http://' . $_SERVER['HTTP_HOST'],
            'headers'   => [

                'Content-Type:application/json', 
                'Authorization:0kdm3hzmb4h3cf'
            ]
        ];
        
        $this->assertInternalType('array',

            Curl::request('https://graph.facebook.com/zuck', $data)
        );
    }

    /**
     * Send DELETE request and obtain response as object.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testDeleteRequestObject() {

        $data = [

            'type'      => 'delete',
            'data'      => ['userId' => 10],
            'timeout'   => 30,
            'referer'   => 'http://' . $_SERVER['HTTP_HOST'],
            'headers'   => [
            
                'Content-Type:application/json', 
                'Authorization:0kdm3hzmb4h3cf'
            ]
        ];
        
        $this->assertInternalType('object',

            Curl::request('https://graph.facebook.com/zuck', $data, 'object')
        );
    }

    /**
     * Send wrong DELETE request.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testDeleteRequestError() {

        $data = [

            'type'    => 'delete',
            'data'    => array('user' => '123456', 'password' => 'xxxxx'),
            'timeout' => 10,
            'referer' => 'http://'.$_SERVER['HTTP_HOST'],
            'headers' => [

                'Content-Type:application/json', 
                'Authorization:0kdm3hzmb4h3cf'
            ]
        ];
        
        $this->assertFalse(Curl::request('https://xxx.xxx.com'), $data);
    }

    /**
     * Send wrong DELETE request.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testTypeRequestError() {

        $data = [

            'type'      => '¿?¿?¿?',
            'data'      => array('user' => '123456', 'password' => 'xxxxx'),
            'timeout'   => 10,
            'referer'   => 'http://'.$_SERVER['HTTP_HOST'],
            'headers'   => [

                'Content-Type:application/json', 
                'Authorization:0kdm3hzmb4h3cf'
            ]
        ];
        
        $this->assertFalse(

            Curl::request('https://graph.facebook.com/zuck', $data)
        );
    }
}
