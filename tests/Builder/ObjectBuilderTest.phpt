<?php declare(strict_types = 1);

namespace Inspire\ConditionalBuilder\Tests\Builder;

use Inspire\ConditionalBuilder\Builder\ObjectBuilder;
use Inspire\ConditionalBuilder\Condition\CallbackCondition;
use Inspire\ConditionalBuilder\Condition\TrueCondition;
use stdClass;
use Tester\Assert;
use Tester\TestCase;

require __DIR__ . '/../bootstrap.php';

/**
 * @author Marek Humpolik <marek.humpolik@inspire.cz>
 */
class ObjectBuilderTest extends TestCase
{
    public function testCallIfArguments(): void
    {
        $object = new stdClass();
        $args = [$object, 'foo', 'bar'];
        $builder = new ObjectBuilder(...$args);

        $builder->callIf(new TrueCondition(), static function(...$callbackArgs) use ($args) {
            Assert::equal($args, $callbackArgs);
        });

        $builder->build();
    }

    public function testCallIf(): void
    {
        $object = new stdClass();
        $builder = new ObjectBuilder();

        $builder->callIf(new TrueCondition(), static function() use ($object) {
            $object->foo = 'foo';
        });

        $builder->callIf(new CallbackCondition(function() {
            return false;
        }), static function() use ($object) {
            $object->bar = 'bar';
        });

        $builder->build();

        Assert::same('foo', $object->foo);
        Assert::false(isset($object->bar));
    }
}

$testCase = new ObjectBuilderTest();
$testCase->run();
