<?php declare(strict_types = 1);

namespace Inspire\ConditionalBuilder\Tests\Conditions;

use Inspire\ConditionalBuilder\Condition\AndCondition;
use Inspire\ConditionalBuilder\Condition\CallbackCondition;
use Inspire\ConditionalBuilder\Condition\ICondition;
use Inspire\ConditionalBuilder\Condition\TrueCondition;
use Tester\Assert;
use Tester\TestCase;

require __DIR__ . '/../bootstrap.php';

/**
 * @author Marek Humpolik <marek.humpolik@inspire.cz>
 */
class AndConditionTest extends TestCase
{
    public function testEvaluationTrue(): void
    {
        $condition = new AndCondition(
            $this->createTrueCondition(),
            $this->createTrueCondition()
        );

        Assert::true($condition->evaluate());
    }

    public function testEvaluationFalse(): void
    {
        $condition = new AndCondition(
            $this->createFalseCondition(),
            $this->createFalseCondition()
        );

        Assert::false($condition->evaluate());
    }

    public function testEvaluationMixed(): void
    {
        $condition = new AndCondition(
            $this->createFalseCondition(),
            $this->createTrueCondition()
        );
        Assert::false($condition->evaluate());
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

$testCase = new AndConditionTest();
$testCase->run();
