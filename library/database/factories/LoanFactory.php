<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Loan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    protected $model = Loan::class;
    public function definition(): array
    {
        $loanDate = $this->faker->date;
        return [
            'user_id' => $this->faker->randomDigitNotNull,
            'book_id' => $this->faker->randomDigitNotNull,
            'date_loan' => $loanDate,
            'date_return' => $this->faker->dateTimeBetween($loanDate, '+1 month'),
            'returned' => $this->faker->boolean
        ];
    }
}
