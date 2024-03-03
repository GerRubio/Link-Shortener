<?php

namespace App\Services;

class TokenValidationService
{
    public function tokenIsValid(string $token): bool
    {
        $stack = [];

        foreach (str_split($token) as $char) {
            $result = match($char) {
                '(', '{', '[' => array_push($stack, $char),
                ')' => empty($stack) || array_pop($stack) !== '(' ? false : null,
                '}' => empty($stack) || array_pop($stack) !== '{' ? false : null,
                ']' => empty($stack) || array_pop($stack) !== '[' ? false : null,
                default => null,
            };

            if ($result === false) {
                return false;
            }
        }

        return empty($stack);
    }
}
