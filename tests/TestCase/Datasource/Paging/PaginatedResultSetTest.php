<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         5.0.0
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Test\TestCase\Datasource\Paging;

use ArrayIterator;
use Cake\Datasource\Paging\PaginatedResultSet;
use Cake\Datasource\ResultSetInterface;
use Cake\TestSuite\TestCase;
use PHPUnit\Framework\Attributes\WithoutErrorHandler;
use function Cake\Collection\collection;

class PaginatedResultSetTest extends TestCase
{
    public function testItems()
    {
        $paginatedResults = new PaginatedResultSet(
            $this->getMockBuilder(ResultSetInterface::class)->getMock(),
            []
        );

        $this->assertInstanceOf(ResultSetInterface::class, $paginatedResults->items());
    }

    #[WithoutErrorHandler]
    public function testCall()
    {
        $resultSet = $this->getMockBuilder(ResultSetInterface::class)->getMock();
        $resultSet
            ->expects($this->once())
            ->method('extract')
            ->with('foo')
            ->willReturn(collection(['bar']));

        $paginatedResults = new PaginatedResultSet(
            $resultSet,
            []
        );

        $this->deprecated(function () use ($paginatedResults) {
            $result = $paginatedResults->extract('foo')->toList();
            $this->assertEquals(['bar'], $result);
        });
    }

    public function testJsonEncode()
    {
        $paginatedResults = new PaginatedResultSet(
            new ArrayIterator([1 => 'a', 2 => 'b', 3 => 'c']),
            []
        );

        $this->assertEquals('{"1":"a","2":"b","3":"c"}', json_encode($paginatedResults));
    }

    public function testSerialization()
    {
        $paginatedResults = new PaginatedResultSet(
            new ArrayIterator([1 => 'a', 2 => 'b', 3 => 'c']),
            ['foo' => 'bar']
        );

        $serialized = serialize($paginatedResults);
        $unserialized = unserialize($serialized);

        $this->assertEquals($paginatedResults->pagingParams(), $unserialized->pagingParams());
        $this->assertEquals($paginatedResults->items(), $unserialized->items());
    }
}
