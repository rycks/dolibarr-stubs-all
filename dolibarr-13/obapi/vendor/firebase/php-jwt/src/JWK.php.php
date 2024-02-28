<?php

namespace Firebase\JWT;

/**
 * JSON Web Key implementation, based on this spec:
 * https://tools.ietf.org/html/draft-ietf-jose-json-web-key-41
 *
 * PHP version 5
 *
 * @category Authentication
 * @package  Authentication_JWT
 * @author   Bui Sy Nguyen <nguyenbs@gmail.com>
 * @license  http://opensource.org/licenses/BSD-3-Clause 3-clause BSD
 * @link     https://github.com/firebase/php-jwt
 */
class JWK
{
    private const OID = '1.2.840.10045.2.1';
    private const ASN1_OBJECT_IDENTIFIER = 0x6;
    private const ASN1_SEQUENCE = 0x10;
    // also defined in JWT
    private const ASN1_BIT_STRING = 0x3;
    private const EC_CURVES = ['P-256' => '1.2.840.10045.3.1.7'];
    /**
     * Parse a set of JWK keys
     *
     * @param array<mixed> $jwks The JSON Web Key Set as an associative array
     * @param string       $defaultAlg The algorithm for the Key object if "alg" is not set in the
     *                                 JSON Web Key Set
     *
     * @return array<string, Key> An associative array of key IDs (kid) to Key objects
     *
     * @throws InvalidArgumentException     Provided JWK Set is empty
     * @throws UnexpectedValueException     Provided JWK Set was invalid
     * @throws DomainException              OpenSSL failure
     *
     * @uses parseKey
     */
    public static function parseKeySet(array $jwks, string $defaultAlg = null) : array
    {
    }
    /**
     * Parse a JWK key
     *
     * @param array<mixed> $jwk An individual JWK
     * @param string       $defaultAlg The algorithm for the Key object if "alg" is not set in the
     *                                 JSON Web Key Set
     *
     * @return Key The key object for the JWK
     *
     * @throws InvalidArgumentException     Provided JWK is empty
     * @throws UnexpectedValueException     Provided JWK was invalid
     * @throws DomainException              OpenSSL failure
     *
     * @uses createPemFromModulusAndExponent
     */
    public static function parseKey(array $jwk, string $defaultAlg = null) : ?\Firebase\JWT\Key
    {
    }
    /**
     * Converts the EC JWK values to pem format.
     *
     * @param   string  $crv The EC curve (only P-256 is supported)
     * @param   string  $x   The EC x-coordinate
     * @param   string  $y   The EC y-coordinate
     *
     * @return  string
     */
    private static function createPemFromCrvAndXYCoordinates(string $crv, string $x, string $y) : string
    {
    }
    /**
     * Create a public key represented in PEM format from RSA modulus and exponent information
     *
     * @param string $n The RSA modulus encoded in Base64
     * @param string $e The RSA exponent encoded in Base64
     *
     * @return string The RSA public key represented in PEM format
     *
     * @uses encodeLength
     */
    private static function createPemFromModulusAndExponent(string $n, string $e) : string
    {
    }
    /**
     * DER-encode the length
     *
     * DER supports lengths up to (2**8)**127, however, we'll only support lengths up to (2**8)**4.  See
     * {@link http://itu.int/ITU-T/studygroups/com17/languages/X.690-0207.pdf#p=13 X.690 paragraph 8.1.3} for more information.
     *
     * @param int $length
     * @return string
     */
    private static function encodeLength(int $length) : string
    {
    }
    /**
     * Encodes a value into a DER object.
     * Also defined in Firebase\JWT\JWT
     *
     * @param   int     $type DER tag
     * @param   string  $value the value to encode
     * @return  string  the encoded object
     */
    private static function encodeDER(int $type, string $value) : string
    {
    }
    /**
     * Encodes a string into a DER-encoded OID.
     *
     * @param   string $oid the OID string
     * @return  string the binary DER-encoded OID
     */
    private static function encodeOID(string $oid) : string
    {
    }
}