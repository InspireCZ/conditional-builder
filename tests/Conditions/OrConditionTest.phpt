<?php declare(strict_types = 1);

namespace Inspire\ConditionalBuilder\Tests\Conditions;

use Inspire\ConditionalBuilder\Condition\CallbackCondition;
use Inspire\ConditionalBuilder\Condition\ICondition;
use Inspire\ConditionalBuilder\Condition\OrCondition;
use Inspire\ConditionalBuilder\Condition\TrueCondition;
use Tester\Assert;
use Tester\TestCase;

require __DIR__ . '/../bootstrap.php';

/**
 * @author Marek Humpolik <marek.humpolik@inspire.cz>
 */
class OrConditionTest extends TestCase
{
    public function testEvaluationTrue(): void
    {
        $orConditions = new OrCondition(
            $this->createTrueCondition(),
            $this->createTrueCondition()
        );

        Assert::true($orConditions->evaluate());
    }

    public function testEvaluationFalse(): void
    {
        $orConditions = new OrCondition(
            $this->createFalseCondition(),
            $this->createFalseCondition()
        );

        Assert::false($orConditions->evaluate());
    }

    public function testEvaluationMixed(): void
    {
        $orConditions = new OrCondition(
            $this->createTrueCondition(),
            $this->createFalseCondition()
        );

        Assert::true($orConditions->evaluate());

        $orConditions = new OrCondition(
            $this->createFalseCondition(),
            $this->createTrueCondition(),
            $this->createTrueCondition()
        );

        Assert::true($orConditions->evaluate());
    }

    private function createTrueCondition(): ICondition
    {
        return new TrueCondition();
    }

    private function createFalseCondition(): ICondition
    {
        return new CallbackCondition(static function() {
            return false;
        });
    }
}

$testCase = new OrConditionTest();
$testCase->run();
