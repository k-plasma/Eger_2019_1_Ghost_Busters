<?php

/**
 * Class containing helper methods.
 */
class Methods
{
    /** Generates a random string.
     * @param int $length Specifies the length of the generated token.
     * @return string The generated token.
     */
    static public function GenerateRandomString(int $length) : string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
