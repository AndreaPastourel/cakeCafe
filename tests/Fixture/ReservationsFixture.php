<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReservationsFixture
 */
class ReservationsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'created' => '2024-11-13 10:09:21',
                'expired' => '2024-11-13 10:09:21',
                'status' => 'Lorem ipsum dolor sit amet',
                'type_id' => 1,
                'package_id' => 1,
                'user_id' => '588d18a1-91de-436b-be91-8b6431abb5e9',
            ],
        ];
        parent::init();
    }
}
