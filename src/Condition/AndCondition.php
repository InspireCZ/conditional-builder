<?php declare(strict_types = 1);

namespace Inspire\ConditionalBuilder\Condition;

/**
 * @author Marek Humpolik <marek.humpolik@inspire.cz>
 */
class AndCondition implements ICondition
{
    /** @var ICondition[] */
    private $conditions;

    public function __construct(ICondition ...$conditions)
    {
        $this->conditions = $conditions;
    }

    public function evaluate(...$callbackArgs): bool
    {
        foreach ($this->conditions as $condition) {
            if (false === $condition->evaluate(...$callbackArgs)) {
                return false;
            }
        }

        return true;
    }
}
