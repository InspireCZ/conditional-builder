<?php declare(strict_types = 1);

namespace Inspire\ConditionalBuilder\Builder;

use Inspire\ConditionalBuilder\Condition\ICondition;

/**
 * @author Marek Humpolik <marek.humpolik@inspire.cz>
 */
class Holder
{
    /** @var ICondition  */
    private $condition;

    /** @var callable  */
    private $callback;

    public function __construct(ICondition $condition, callable $callback)
    {
        $this->condition = $condition;
        $this->callback = $callback;
    }

    /**
     * @return ICondition
     */
    public function getCondition(): ICondition
    {
        return $this->condition;
    }

    /**
     * @return callable
     */
    public function getCallback(): callable
    {
        return $this->callback;
    }
}
