<?php

namespace Ttskch\FizzBuzz\Resolver;

use Ttskch\FizzBuzz\Exception\RuntimeException;
use Ttskch\FizzBuzz\Value\Number;
use Ttskch\FizzBuzz\Value\Result;

class NabeatsuResolver implements ResolverInterface
{
    public function resolve(Number $number)
    {
        $three = new Number(3);

        if ($number->contains($three) || $number->isMultiplesOf($three)) {
            return new Result($this->crazify($number));
        }

        return new Result($number);
    }

    private function crazify(Number $number)
    {
        if ($number->getValue() > 40) {
            throw new RuntimeException('Sorry, cannot crazify the number larger than 40.');
        }

        $crazies = require __DIR__ . '/../Resources/Nabeatsu/crazies.php';

        return $crazies[$number->getValue()];
    }
}
