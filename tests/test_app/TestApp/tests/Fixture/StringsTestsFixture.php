<?php
declare(strict_types=1);

namespace TestApp\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class StringsTestsFixture extends TestFixture
{
    /**
     * Table property
     *
     * @var string
     */
    public string $table = 'strings';

    /**
     * Fields array
     *
     * @var array
     */
    public array $fields = [
        'id' => ['type' => 'integer'],
        'name' => ['type' => 'string', 'length' => '255'],
        'email' => ['type' => 'string', 'length' => '255'],
        'age' => ['type' => 'integer', 'default' => 10],
    ];

    /**
     * Records property
     *
     * @var array
     */
    public array $records = [
        ['name' => 'Mark Doe', 'email' => 'mark.doe@email.com'],
        ['name' => 'John Doe', 'email' => 'john.doe@email.com', 'age' => 20],
        ['email' => 'jane.doe@email.com', 'name' => 'Jane Doe', 'age' => 30],
    ];
}