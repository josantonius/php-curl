<?php
/**
 * API Requests using the HTTP protocol through the Curl library.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2016 - 2017
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/PHP-Curl
 * @since      1.0.0
 */

namespace Josantonius\Curl;

use Josantonius\Curl\Exception\CurlException;

/**
 * Curl handler.
 *
 * @since 1.0.0
 */
class Curl { 

    /**
     * Default params.
     *
     * @since 1.1.3
     *
     * @var string
     */
    protected static $defaultParams = [

        'data'    => '',
        'type'    => 'get',
        'referer' => null,
        'timeout' => 30,
        'headers' => array('Content-Type:text/html'),
        'agent'   => 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) ' .
                     'Gecko/20100101 Firefox/31.0'
    ];

    /**
     * Make request and get response website.
     *
     * @since 1.0.0
     *
     * @param string $url → return result as array or object
     *
     * @param  array  $params  
     *         string $params['referer'] → the referrer URL
     *         int    $params['timeout'] → timeout
     *         string $params['agent']   → useragent
     *         array  $params['headers'] → HTTP headers
     *         array  $params['data']    → parameters to send
     *         string $params['type']    → type of request
     *                
     * @param string $result → return result as array or object
     *
     * @throws CurlException → some request params wasn't received
     *
     * @return array|object → response
     */
    public static function request($url, $params = [], $result = 'array') {

        $init = curl_init($url);

        $params = self::_checkParams($params);

        if (!$curl = self::_setCurlOptions($params)) { return false; }
        
        curl_setopt_array($init, $curl);

        $output = curl_exec($init);

        curl_close($init);

        $sanitize = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $output);

        $response = json_decode($sanitize, $result === 'array');

        return ($response && json_last_error() === 0) ? $response : false;
   }

    /**
     * Check request params.
     *
     * @since 1.1.3
     *
     * @param string $params → request params
     *
     * @return array → request params
     */
    private static function _checkParams($params) {
        
        $values = ['data', 'type', 'referer', 'timeout', 'agent', 'headers'];

        foreach ($values as $value) {

            if (!isset($params[$value])) {
            
                $params[$value] = self::$defaultParams[$value];
            }
        }

        return $params;
    }

    /**
     * Set parameters according to the type of request.
     *
     * @since 1.1.3
     *
     * @param string $param → request params
     *
     * @return array → request params
     */
    private static function _setCurlOptions($param) {

        return in_array($param['type'], ['get', 'post', 'put', 'delete']) ? [

            CURLOPT_VERBOSE => true,
            CURLOPT_REFERER => $param['referer'] ?: self::_getUrl(),
            CURLOPT_TIMEOUT => $param['timeout'],
            CURLOPT_USERAGENT => $param['agent'],
            CURLOPT_HTTPHEADER => $param['headers'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => in_array($param['type'], ['post','put']),
            CURLOPT_POSTFIELDS => json_encode($param['data']) ?: null,
            CURLOPT_CUSTOMREQUEST => strtoupper($param['type']),

        ] : false;
    }

    /**
     * Check the protocol site (http | https) and get the current url.
     *
     * @since 1.0.0
     *
     * @return string → full url
     */
    private static function _getUrl() {
                
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {

            return 'https://' . $_SERVER['HTTP_HOST'];
        }

        return 'http://' . $_SERVER['HTTP_HOST'];
    }
}
