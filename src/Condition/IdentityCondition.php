<?php declare(strict_types = 1);

namespace Inspire\ConditionalBuilder\Condition;

/**
 * @author Marek Humpolik <marek.humpolik@inspire.cz>
 */
class IdentityCondition implements ICondition
{
    /** @var object */
    private $comparedObject;

    /** @var object */
    private $object;

    public function __construct($object, $comparedObject)
    {
        $this->comparedObject = $comparedObject;
        $this->object = $object;
    }

    public function evaluate(...$callbackArgs): bool
    {
        return $this->object === $this->comparedObject;
    }
}
