<?php declare(strict_types = 1);

namespace Inspire\ConditionalBuilder\Condition;

/**
 * @author Marek Humpolik <marek.humpolik@inspire.cz>
 */
class CallbackCondition implements ICondition
{
    /** @var callable */
    private $eval;

    public function __construct(callable $eval)
    {
        $this->eval = $eval;
    }

    public function evaluate(...$callbackArgs): bool
    {
        $eval = $this->eval;

        return $eval(...$callbackArgs);
    }
}
