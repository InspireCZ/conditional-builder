<?php declare(strict_types = 1);

namespace Inspire\ConditionalBuilder\Builder;

use Inspire\ConditionalBuilder\Condition\ICondition;

/**
 * @author Marek Humpolik <marek.humpolik@inspire.cz>
 */
interface IConditionalCallbackBuilder
{
    public function build(): void;

    public function callIf(ICondition $condition, callable $callback): void;
}
