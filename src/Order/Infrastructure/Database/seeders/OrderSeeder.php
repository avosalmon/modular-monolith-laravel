<?php

declare(strict_types=1);

namespace Laracon\Order\Infrastructure\Database\Seeders;

use Laracon\Order\Domain\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();

        Order::factory(10)->for($user)->create();
    }
}
