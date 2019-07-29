<?php declare(strict_types = 1);

namespace Inspire\ConditionalBuilder\Condition;

/**
 * @author Marek Humpolik <marek.humpolik@inspire.cz>
 */
class TrueCondition implements ICondition
{
    public function evaluate(...$callbackArgs): bool
    {
        return true;
    }
}
