<?php declare(strict_types = 1);

namespace Inspire\ConditionalBuilder\Condition;

/**
 * @author Marek Humpolik <marek.humpolik@inspire.cz>
 */
class OrCondition implements ICondition
{
    /** @var ICondition[] */
    private $conditions;

    public function __construct(ICondition $condition, ICondition ...$conditions)
    {
        $this->conditions = \array_merge([$condition], $conditions);
    }

    public function evaluate(...$callbackArgs): bool
    {
        foreach ($this->conditions as $condition) {
            if ($condition->evaluate(...$callbackArgs)) {
                return true;
            }
        }

        return false;
    }
}
