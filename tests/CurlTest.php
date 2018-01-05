<?php
/**
 * API Requests using the HTTP protocol through the Curl library.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2016 - 2018 (c) Josantonius - PHP-Curl
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Josantonius/PHP-Curl
 * @since     1.1.4
 */
namespace Josantonius\Curl;

use PHPUnit\Framework\TestCase;

/**
 * Tests class for Curl library.
 */
final class CurlTest extends TestCase
{
    /**
     * Curl instance.
     *
     * @since 1.1.5
     *
     * @var object
     */
    protected $Curl;

    /**
     * Set up.
     *
     * @since 1.1.5
     */
    public function setUp()
    {
        parent::setUp();

        $this->Curl = new Curl;
    }

    /**
     * Check if it is an instance.
     *
     * @since 1.1.5
     */
    public function testIsInstanceOf()
    {
        $this->assertInstanceOf('Josantonius\Curl\Curl', $this->Curl);
    }

    /**
     * Send GET request and obtain response as array.
     */
    public function testGetRequestArray()
    {
        $curl = $this->Curl;

        $this->assertInternalType(
            'array',
            $curl::request('https://graph.facebook.com/zuck')
        );
    }

    /**
     * Send GET request and obtain response as object.
     */
    public function testGetRequestObject()
    {
        $curl = $this->Curl;

        $this->assertInternalType(
            'object',
            $curl::request('https://graph.facebook.com/zuck', false, 'object')
        );
    }

    /**
     * Send GET request with params and obtain response as array.
     */
    public function testGetRequestWithParamsArray()
    {
        $curl = $this->Curl;

        $data = [
            'timeout' => 10,
            'referer' => 'http://site.com',
        ];

        $this->assertInternalType(
            'array',
            $curl::request('https://graph.facebook.com/zuck', $data)
        );
    }

    /**
     * Send GET request with params and obtain response as object.
     */
    public function testGetRequestWithParamsObject()
    {
        $curl = $this->Curl;

        $data = [
            'timeout' => 10,
            'referer' => 'http://site.com',
        ];

        $this->assertInternalType(
            'object',
            $curl::request('https://graph.facebook.com/zuck', $data, 'object')
        );
    }

    /**
     * Send wrong GET request.
     */
    public function testGetRequestError()
    {
        $curl = $this->Curl;

        $this->assertFalse($curl::request('https://xxx.xxx.com'));
    }

    /**
     * Send POST request and obtain response as array.
     */
    public function testPostRequestArray()
    {
        $curl = $this->Curl;

        $data = [
            'type' => 'post',
            'data' => ['user' => '123456', 'password' => 'xxxxx'],
            'timeout' => 10,
            'referer' => 'http://' . $_SERVER['HTTP_HOST'],
            'headers' => [
                'Content-Type:application/json',
                'Authorization:0kdm3hzmb4h3cf',
            ],
        ];

        $this->assertInternalType(
            'array',
            $curl::request('https://graph.facebook.com/zuck', $data)
        );
    }

    /**
     * Send POST request and obtain response as object.
     */
    public function testPostRequestObject()
    {
        $curl = $this->Curl;

        $data = [
            'type' => 'post',
            'data' => ['user' => '123456', 'password' => 'xxxxx'],
            'timeout' => 10,
            'referer' => 'http://' . $_SERVER['HTTP_HOST'],
            'headers' => [
                'Content-Type:application/json',
                'Authorization:0kdm3hzmb4h3cf',
            ],
        ];

        $this->assertInternalType(
            'object',
            $curl::request('https://graph.facebook.com/zuck', $data, 'object')
        );
    }

    /**
     * Send wrong POST request.
     */
    public function testPostRequestError()
    {
        $curl = $this->Curl;

        $data = [
            'type' => 'post',
            'data' => ['user' => '123456', 'password' => 'xxxxx'],
            'timeout' => 10,
            'referer' => 'http://' . $_SERVER['HTTP_HOST'],
            'headers' => [
                'Content-Type:application/json',
                'Authorization:0kdm3hzmb4h3cf',
            ],
        ];

        $this->assertFalse($curl::request('https://xxx.xxx.com', $data));
    }

    /**
     * Send PUT request and obtain response as array.
     */
    public function testPutRequestArray()
    {
        $curl = $this->Curl;

        $data = [
            'type' => 'put',
            'data' => ['email' => 'new@email.com'],
            'timeout' => 30,
            'referer' => 'http://' . $_SERVER['HTTP_HOST'],
            'headers' => [
                'Content-Type:application/json',
                'Authorization:0kdm3hzmb4h3cf',
            ],
        ];

        $this->assertInternalType(
            'array',
            $curl::request('https://graph.facebook.com/zuck', $data)
        );
    }

    /**
     * Send PUT request and obtain response as object.
     */
    public function testPutRequestObject()
    {
        $curl = $this->Curl;

        $data = [
            'type' => 'put',
            'data' => ['email' => 'new@email.com'],
            'timeout' => 30,
            'referer' => 'http://' . $_SERVER['HTTP_HOST'],
            'headers' => [
                'Content-Type:application/json',
                'Authorization:0kdm3hzmb4h3cf',
            ],
        ];

        $this->assertInternalType(
            'object',
            $curl::request('https://graph.facebook.com/zuck', $data, 'object')
        );
    }

    /**
     * Send wrong PUT request.
     */
    public function testPutRequestError()
    {
        $curl = $this->Curl;

        $data = [
            'type' => 'put',
            'data' => ['user' => '123456', 'password' => 'xxxxx'],
            'timeout' => 10,
            'referer' => 'http://' . $_SERVER['HTTP_HOST'],
            'headers' => [
                'Content-Type:application/json',
                'Authorization:0kdm3hzmb4h3cf',
            ],
        ];

        $this->assertFalse($curl::request('https://xxx.xxx.com', $data));
    }

    /**
     * Send DELETE request and obtain response as array.
     */
    public function testDeleteRequestArray()
    {
        $curl = $this->Curl;

        $data = [
            'type' => 'delete',
            'data' => ['userId' => 10],
            'timeout' => 30,
            'referer' => 'http://' . $_SERVER['HTTP_HOST'],
            'headers' => [
                'Content-Type:application/json',
                'Authorization:0kdm3hzmb4h3cf',
            ],
        ];

        $this->assertInternalType(
            'array',
            $curl::request('https://graph.facebook.com/zuck', $data)
        );
    }

    /**
     * Send DELETE request and obtain response as object.
     */
    public function testDeleteRequestObject()
    {
        $curl = $this->Curl;

        $data = [
            'type' => 'delete',
            'data' => ['userId' => 10],
            'timeout' => 30,
            'referer' => 'http://' . $_SERVER['HTTP_HOST'],
            'headers' => [
                'Content-Type:application/json',
                'Authorization:0kdm3hzmb4h3cf',
            ],
        ];

        $this->assertInternalType(
            'object',
            $curl::request('https://graph.facebook.com/zuck', $data, 'object')
        );
    }

    /**
     * Send wrong DELETE request.
     */
    public function testDeleteRequestError()
    {
        $curl = $this->Curl;

        $data = [
            'type' => 'delete',
            'data' => ['user' => '123456', 'password' => 'xxxxx'],
            'timeout' => 10,
            'referer' => 'http://' . $_SERVER['HTTP_HOST'],
            'headers' => [
                'Content-Type:application/json',
                'Authorization:0kdm3hzmb4h3cf',
            ],
        ];

        $this->assertFalse($curl::request('https://xxx.xxx.com', $data));
    }

    /**
     * Send wrong DELETE request.
     */
    public function testTypeRequestError()
    {
        $curl = $this->Curl;

        $data = [
            'type' => '¿?¿?¿?',
            'data' => ['user' => '123456', 'password' => 'xxxxx'],
            'timeout' => 10,
            'referer' => 'http://' . $_SERVER['HTTP_HOST'],
            'headers' => [
                'Content-Type:application/json',
                'Authorization:0kdm3hzmb4h3cf',
            ],
        ];

        $this->assertFalse(
            $curl::request('https://graph.facebook.com/zuck', $data)
        );
    }
}
