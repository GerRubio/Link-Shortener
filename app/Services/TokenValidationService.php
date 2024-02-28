<?php

namespace App\Services;

class TokenValidationService
{
    public function tokenIsValid(string $token): bool
    {
        $stack = [];

        foreach (str_split($token) as $char) {
            switch ($char) {
                case '(':
                case '{':
                case '[':
                    $stack[] = $char;

                    break;
                case ')':
                    if (empty($stack) || array_pop($stack) !== '(') {
                        return false;
                    }

                    break;
                case '}':
                    if (empty($stack) || array_pop($stack) !== '{') {
                        return false;
                    }

                    break;
                case ']':
                    if (empty($stack) || array_pop($stack) !== '[') {
                        return false;
                    }

                    break;
            }
        }

        return empty($stack);
    }
}
