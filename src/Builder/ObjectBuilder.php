<?php declare(strict_types = 1);

namespace Inspire\ConditionalBuilder\Builder;

use Inspire\ConditionalBuilder\Condition\ICondition;

/**
 * @author Marek Humpolik <marek.humpolik@inspire.cz>
 */
class ObjectBuilder implements IConditionalCallbackBuilder
{
    /** @var Holder[] */
    private $holders = [];

    /** @var array */
    private $callbackArgs;

    public function __construct(...$callbackArgs)
    {
        $this->callbackArgs = $callbackArgs;
    }

    public function callIf(ICondition $condition, callable $callback): void
    {
        $this->holders[] = new Holder($condition, $callback);
    }

    public function build(): void
    {
        foreach ($this->holders as $holder) {

            if ($holder->getCondition()->evaluate(...$this->callbackArgs)) {
                $holder->getCallback()(...$this->callbackArgs);
            }
        }
    }
}
