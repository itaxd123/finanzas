<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
			'description' => $this->faker->name,
			'total' => $this->faker->name,
			'id_user' => $this->faker->name,
			'id_type_transaction' => $this->faker->name,
			'id_type_currency' => $this->faker->name,
        ];
    }
}
