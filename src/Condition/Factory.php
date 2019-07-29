<?php declare(strict_types = 1);

namespace Inspire\ConditionalBuilder\Condition;

use Nette\StaticClass;

/**
 *
 * @author Marek Humpolik <marek.humpolik@inspire.cz>
 */
class Factory
{
    use StaticClass;

    public static function isSame($object, $comparedObject): ICondition
    {
        return new IdentityCondition($object, $comparedObject);
    }

    public static function callback(callable $callback): ICondition
    {
        return new CallbackCondition($callback);
    }
}
