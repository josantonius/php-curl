<?php
/**
 * API Requests using the HTTP protocol through the Curl library.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2016 - 2017 JST PHP Framework
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/PHP-Curl
 * @since      1.0.0
 */

namespace Josantonius\Curl\Tests;

use Josantonius\Curl\Curl;

/**
 * Tests class for Curl library.
 *
 * @since 1.0.0
 */
class CurlTest { 

    /**
     * Get request.
     *
     * @since 1.0.0
     */
    public static function testGetRequest() {

        $data = [
           'url'       => 'https://graph.facebook.com/zuck',
           'type'      => 'get',
        ];

        echo '<pre>'; Curl::request($data); echo '</pre>'; 
    }

    /**
     * Post request.
     *
     * @since 1.0.0
     */
    public static function testPostRequest() {

        $data = [
            'url'       => 'https://graph.facebook.com/zuck',
            'type'      => 'post',
            'data'      => array('user' => '123456', 'password' => 'xxxxx'),
            'timeout'   => 10,
            'referer'   => 'http://'.$_SERVER['HTTP_HOST'],
            'headers'   => [
                'Content-Type:application/json', 
                'Authorization:0kdm3hzmb4h3cf'
            ]
        ];

        echo '<pre>'; Curl::request($data); echo '</pre>'; 
    }

    /**
     * Put request.
     *
     * @since 1.0.0
     */
    public static function testPutRequest() {

        $data = [
            'url'       => 'https://graph.facebook.com/zuck',
            'type'      => 'put',
            'data'      => array('email' => 'new@email.com'),
            'timeout'   => 30,
            'referer'   => 'http://'.$_SERVER['HTTP_HOST'],
            'headers'   => [
                'Content-Type:application/json', 
                'Authorization:0kdm3hzmb4h3cf'
            ]
        ];

        echo '<pre>'; Curl::request($data); echo '</pre>'; 
    }

    /**
     * Delete request.
     *
     * @since 1.0.0
     */
    public static function testDeleteRequest() {

        $data = [
            'url'       => 'https://graph.facebook.com/zuck',
            'type'      => 'delete',
            'data'      => ['userId' => 10],
            'timeout'   => 30,
            'referer'   => 'http://' . $_SERVER['HTTP_HOST'],
            'headers'   => [
                'Content-Type:application/json', 
                'Authorization:0kdm3hzmb4h3cf'
            ]
        ];

        echo '<pre>'; Curl::request($data); echo '</pre>'; 
    }

    /**
     * Response error.
     *
     * @since 1.0.0
     */
    public static function testResponseError() {

        $data = [
           'url'       => 'https://xxx.xxx.com',
           'type'      => 'get'
        ];

        Curl::request($data);
    }

    /**
     * Response error.
     *
     * @since 1.0.0
     */
    public static function testUnknownTypeError() {

        $data = [
           'url'       => 'https://graph.facebook.com/zuck',
           'type'      => 'unknown',
        ];

        Curl::request($data);
    }
}
