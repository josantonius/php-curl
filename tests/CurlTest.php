<?php
/**
 * API Requests using the HTTP protocol through the Curl library.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2016 - 2017 (c) Josantonius - PHP-Curl
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Josantonius/PHP-Curl
 * @since     1.1.4
 */
namespace Josantonius\Curl;

use PHPUnit\Framework\TestCase;

/**
 * Tests class for Curl library.
 *
 * @since 1.1.4
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
     * Send GET request and obtain response as array.
     *
     * @since 1.1.4
     */
    public function testGetRequestArray()
    {
        $this->assertInternalType(
            'array',
            $this->Curl->request('https://graph.facebook.com/zuck')
        );
    }

    /**
     * Send GET request and obtain response as object.
     *
     * @since 1.1.4
     */
    public function testGetRequestObject()
    {
        $this->assertInternalType(
            'object',
            $this->Curl->request('https://graph.facebook.com/zuck', false, 'object')
        );
    }

    /**
     * Send GET request with params and obtain response as array.
     *
     * @since 1.1.4
     */
    public function testGetRequestWithParamsArray()
    {
        $data = [
            'timeout' => 10,
            'referer' => 'http://site.com',
        ];

        $this->assertInternalType(
            'array',
            $this->Curl->request('https://graph.facebook.com/zuck', $data)
        );
    }

    /**
     * Send GET request with params and obtain response as object.
     *
     * @since 1.1.4
     */
    public function testGetRequestWithParamsObject()
    {
        $data = [
            'timeout' => 10,
            'referer' => 'http://site.com',
        ];

        $this->assertInternalType(
            'object',
            $this->Curl->request('https://graph.facebook.com/zuck', $data, 'object')
        );
    }

    /**
     * Send wrong GET request.
     *
     * @since 1.1.4
     */
    public function testGetRequestError()
    {
        $this->assertFalse($this->Curl->request('https://xxx.xxx.com'));
    }

    /**
     * Send POST request and obtain response as array.
     *
     * @since 1.1.4
     */
    public function testPostRequestArray()
    {
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
            $this->Curl->request('https://graph.facebook.com/zuck', $data)
        );
    }

    /**
     * Send POST request and obtain response as object.
     *
     * @since 1.1.4
     */
    public function testPostRequestObject()
    {
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
            $this->Curl->request('https://graph.facebook.com/zuck', $data, 'object')
        );
    }

    /**
     * Send wrong POST request.
     *
     * @since 1.1.4
     */
    public function testPostRequestError()
    {
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

        $this->assertFalse($this->Curl->request('https://xxx.xxx.com', $data));
    }

    /**
     * Send PUT request and obtain response as array.
     *
     * @since 1.1.4
     */
    public function testPutRequestArray()
    {
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
            $this->Curl->request('https://graph.facebook.com/zuck', $data)
        );
    }

    /**
     * Send PUT request and obtain response as object.
     *
     * @since 1.1.4
     */
    public function testPutRequestObject()
    {
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
            $this->Curl->request('https://graph.facebook.com/zuck', $data, 'object')
        );
    }

    /**
     * Send wrong PUT request.
     *
     * @since 1.1.4
     */
    public function testPutRequestError()
    {
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

        $this->assertFalse($this->Curl->request('https://xxx.xxx.com', $data));
    }

    /**
     * Send DELETE request and obtain response as array.
     *
     * @since 1.1.4
     */
    public function testDeleteRequestArray()
    {
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
            $this->Curl->request('https://graph.facebook.com/zuck', $data)
        );
    }

    /**
     * Send DELETE request and obtain response as object.
     *
     * @since 1.1.4
     */
    public function testDeleteRequestObject()
    {
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
            $this->Curl->request('https://graph.facebook.com/zuck', $data, 'object')
        );
    }

    /**
     * Send wrong DELETE request.
     *
     * @since 1.1.4
     */
    public function testDeleteRequestError()
    {
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

        $this->assertFalse($this->Curl->request('https://xxx.xxx.com', $data));
    }

    /**
     * Send wrong DELETE request.
     *
     * @since 1.1.4
     */
    public function testTypeRequestError()
    {
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
            $this->Curl->request('https://graph.facebook.com/zuck', $data)
        );
    }
}
