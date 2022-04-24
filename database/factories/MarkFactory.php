<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Mark;
use App\Models\Student;

class MarkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mark::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomNumber =  $this->faker->numberBetween(1, 100);
        return [
            'student_id' => $this->faker->randomElement(Student::pluck('id')),
            'maths' => $randomNumber,
            'science' => $randomNumber,
            'history' => $randomNumber,
            'total' => $randomNumber * 3,
            'term' => $this->faker->randomElement(['One', 'Two']),
            'created_at' => now(),
        ];
    }
}
