<?php

namespace Firebase\JWT;

/**
 * JSON Web Token implementation, based on this spec:
 * https://tools.ietf.org/html/rfc7519
 *
 * PHP version 5
 *
 * @category Authentication
 * @package  Authentication_JWT
 * @author   Neuman Vong <neuman@twilio.com>
 * @author   Anant Narayanan <anant@php.net>
 * @license  http://opensource.org/licenses/BSD-3-Clause 3-clause BSD
 * @link     https://github.com/firebase/php-jwt
 */
class JWT
{
    private const ASN1_INTEGER = 0x2;
    private const ASN1_SEQUENCE = 0x10;
    private const ASN1_BIT_STRING = 0x3;
    /**
     * When checking nbf, iat or expiration times,
     * we want to provide some extra leeway time to
     * account for clock skew.
     *
     * @var int
     */
    public static $leeway = 0;
    /**
     * Allow the current timestamp to be specified.
     * Useful for fixing a value within unit testing.
     * Will default to PHP time() value if null.
     *
     * @var ?int
     */
    public static $timestamp = null;
    /**
     * @var array<string, string[]>
     */
    public static $supported_algs = ['ES384' => ['openssl', 'SHA384'], 'ES256' => ['openssl', 'SHA256'], 'HS256' => ['hash_hmac', 'SHA256'], 'HS384' => ['hash_hmac', 'SHA384'], 'HS512' => ['hash_hmac', 'SHA512'], 'RS256' => ['openssl', 'SHA256'], 'RS384' => ['openssl', 'SHA384'], 'RS512' => ['openssl', 'SHA512'], 'EdDSA' => ['sodium_crypto', 'EdDSA']];
    /**
     * Decodes a JWT string into a PHP object.
     *
     * @param string                 $jwt            The JWT
     * @param Key|array<string,Key> $keyOrKeyArray  The Key or associative array of key IDs (kid) to Key objects.
     *                                              If the algorithm used is asymmetric, this is the public key
     *                                              Each Key object contains an algorithm and matching key.
     *                                              Supported algorithms are 'ES384','ES256', 'HS256', 'HS384',
     *                                              'HS512', 'RS256', 'RS384', and 'RS512'
     *
     * @return stdClass The JWT's payload as a PHP object
     *
     * @throws InvalidArgumentException     Provided key/key-array was empty or malformed
     * @throws DomainException              Provided JWT is malformed
     * @throws UnexpectedValueException     Provided JWT was invalid
     * @throws SignatureInvalidException    Provided JWT was invalid because the signature verification failed
     * @throws BeforeValidException         Provided JWT is trying to be used before it's eligible as defined by 'nbf'
     * @throws BeforeValidException         Provided JWT is trying to be used before it's been created as defined by 'iat'
     * @throws ExpiredException             Provided JWT has since expired, as defined by the 'exp' claim
     *
     * @uses jsonDecode
     * @uses urlsafeB64Decode
     */
    public static function decode(string $jwt, $keyOrKeyArray) : \stdClass
    {
    }
    /**
     * Converts and signs a PHP array into a JWT string.
     *
     * @param array<mixed>          $payload PHP array
     * @param string|resource|OpenSSLAsymmetricKey|OpenSSLCertificate $key The secret key.
     * @param string                $alg     Supported algorithms are 'ES384','ES256', 'HS256', 'HS384',
     *                                       'HS512', 'RS256', 'RS384', and 'RS512'
     * @param string                $keyId
     * @param array<string, string> $head    An array with header elements to attach
     *
     * @return string A signed JWT
     *
     * @uses jsonEncode
     * @uses urlsafeB64Encode
     */
    public static function encode(array $payload, $key, string $alg, string $keyId = null, array $head = null) : string
    {
    }
    /**
     * Sign a string with a given key and algorithm.
     *
     * @param string $msg  The message to sign
     * @param string|resource|OpenSSLAsymmetricKey|OpenSSLCertificate  $key  The secret key.
     * @param string $alg  Supported algorithms are 'ES384','ES256', 'HS256', 'HS384',
     *                     'HS512', 'RS256', 'RS384', and 'RS512'
     *
     * @return string An encrypted message
     *
     * @throws DomainException Unsupported algorithm or bad key was specified
     */
    public static function sign(string $msg, $key, string $alg) : string
    {
    }
    /**
     * Verify a signature with the message, key and method. Not all methods
     * are symmetric, so we must have a separate verify and sign method.
     *
     * @param string $msg         The original message (header and body)
     * @param string $signature   The original signature
     * @param string|resource|OpenSSLAsymmetricKey|OpenSSLCertificate  $keyMaterial For HS*, a string key works. for RS*, must be an instance of OpenSSLAsymmetricKey
     * @param string $alg         The algorithm
     *
     * @return bool
     *
     * @throws DomainException Invalid Algorithm, bad key, or OpenSSL failure
     */
    private static function verify(string $msg, string $signature, $keyMaterial, string $alg) : bool
    {
    }
    /**
     * Decode a JSON string into a PHP object.
     *
     * @param string $input JSON string
     *
     * @return mixed The decoded JSON string
     *
     * @throws DomainException Provided string was invalid JSON
     */
    public static function jsonDecode(string $input)
    {
    }
    /**
     * Encode a PHP array into a JSON string.
     *
     * @param array<mixed> $input A PHP array
     *
     * @return string JSON representation of the PHP array
     *
     * @throws DomainException Provided object could not be encoded to valid JSON
     */
    public static function jsonEncode(array $input) : string
    {
    }
    /**
     * Decode a string with URL-safe Base64.
     *
     * @param string $input A Base64 encoded string
     *
     * @return string A decoded string
     *
     * @throws InvalidArgumentException invalid base64 characters
     */
    public static function urlsafeB64Decode(string $input) : string
    {
    }
    /**
     * Encode a string with URL-safe Base64.
     *
     * @param string $input The string you want encoded
     *
     * @return string The base64 encode of what you passed in
     */
    public static function urlsafeB64Encode(string $input) : string
    {
    }
    /**
     * Determine if an algorithm has been provided for each Key
     *
     * @param Key|ArrayAccess<string,Key>|array<string,Key> $keyOrKeyArray
     * @param string|null            $kid
     *
     * @throws UnexpectedValueException
     *
     * @return Key
     */
    private static function getKey($keyOrKeyArray, ?string $kid) : \Firebase\JWT\Key
    {
    }
    /**
     * @param string $left  The string of known length to compare against
     * @param string $right The user-supplied string
     * @return bool
     */
    public static function constantTimeEquals(string $left, string $right) : bool
    {
    }
    /**
     * Helper method to create a JSON error.
     *
     * @param int $errno An error number from json_last_error()
     *
     * @throws DomainException
     *
     * @return void
     */
    private static function handleJsonError(int $errno) : void
    {
    }
    /**
     * Get the number of bytes in cryptographic strings.
     *
     * @param string $str
     *
     * @return int
     */
    private static function safeStrlen(string $str) : int
    {
    }
    /**
     * Convert an ECDSA signature to an ASN.1 DER sequence
     *
     * @param   string $sig The ECDSA signature to convert
     * @return  string The encoded DER object
     */
    private static function signatureToDER(string $sig) : string
    {
    }
    /**
     * Encodes a value into a DER object.
     *
     * @param   int     $type DER tag
     * @param   string  $value the value to encode
     *
     * @return  string  the encoded object
     */
    private static function encodeDER(int $type, string $value) : string
    {
    }
    /**
     * Encodes signature from a DER object.
     *
     * @param   string  $der binary signature in DER format
     * @param   int     $keySize the number of bits in the key
     *
     * @return  string  the signature
     */
    private static function signatureFromDER(string $der, int $keySize) : string
    {
    }
    /**
     * Reads binary DER-encoded data and decodes into a single object
     *
     * @param string $der the binary data in DER format
     * @param int $offset the offset of the data stream containing the object
     *                    to decode
     *
     * @return array{int, string|null} the new offset and the decoded object
     */
    private static function readDER(string $der, int $offset = 0) : array
    {
    }
}