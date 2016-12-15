<?php declare(strict_types=1);
/**
 * API Requests using the HTTP protocol through the Curl library.
 * 
 * @category   JST
 * @package    Curl
 * @subpackage Curl
 * @author     Josantonius - info@josantonius.com
 * @copyright  Copyright (c) 2016 JST PHP Framework
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @version    1.0.0
 * @link       https://github.com/Josantonius/PHP-Curl
 * @since      File available since 1.0.0 - Update: 2016-12-15
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
     * Default timeout.
     *
     * @var int
     */
    private static $_timeout = 30;

    /**
     * Useragent default if another is not indicated.
     *
     * @var string
     */
    private static $_useragent = 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) ' .
                                 'Gecko/20100101 Firefox/31.0';

    /**
     * Headers default if another is not indicated.
     *
     * @var array
     */
    private static $_headers = array('Content-Type:text/html');

    /**
     * Make request and get response website.
     * 
     * @param  array  $params  
     *         string $params['url']       → the request URL
     *         string $params['referer']   → the referrer URL
     *         int    $params['timeout']   → timeout
     *         string $params['useragent'] → useragent
     *         array  $params['headers']   → HTTP headers
     *         array  $params['data']      → parameters to send
     *         string $params['type']      → type of request
     *                
     * @param string $results → return result as array or object
     *
     * @throws CurlException  → parameter type not recognized
     * @throws CurlException  → no response has been received
     * @return array|object   → response
     */
    public static function request(array $params, string $results = 'array') {

        $init = curl_init($params['url']);

        $params['data'] = $params['data'] ?? "";

        $curl = [
            CURLOPT_VERBOSE        => true, 
            CURLOPT_REFERER        => $params['referer']   ?? self::getUrl(),
            CURLOPT_TIMEOUT        => $params['timeout']   ?? self::$_timeout,
            CURLOPT_USERAGENT      => $params['useragent'] ?? self::$_useragent,
            CURLOPT_HTTPHEADER     => $params['headers']   ?? self::$_headers,
            CURLOPT_RETURNTRANSFER => true,
        ];

        switch ($params['type']) {

            case 'get':
                # code...
                break;
         
            case 'post':
                $curl[CURLOPT_POST]       = true;
                $curl[CURLOPT_POSTFIELDS] = json_encode($params['data']);
                break;

            case 'put':
                $curl[CURLOPT_POST]          = true;
                $curl[CURLOPT_CUSTOMREQUEST] = 'PUT';
                $curl[CURLOPT_POSTFIELDS]    = json_encode($params['data']);
                break;

            case 'delete':
                $curl[CURLOPT_CUSTOMREQUEST] = 'DELETE';
                break;

            default:
                throw new CurlException('Parameter type not recognized.', 900);
                break;
        }

        curl_setopt_array($init, $curl);

        $output = curl_exec($init);

        if (is_null($output) || !$output) {

            throw new CurlException('No response has been received.', 900);
        }

        curl_close($init);

        if ($results === 'object') {

            return json_decode($output);
        }

        return json_decode(
                    preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $output), 
                    true
                );
   }

    /**
     * Check the protocol site (http | https) and get the current url.
     *
     * @return string → full url
     */
    private static function getUrl(): string {
        
        if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {

            return 'https://' . $_SERVER['HTTP_HOST'];
        }

        return 'http://' . $_SERVER['HTTP_HOST'];
    }
}
