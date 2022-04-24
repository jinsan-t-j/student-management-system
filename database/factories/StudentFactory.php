<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\Teacher;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->name();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'age' => $this->faker->numberBetween($min = 1, $max = 100),
            'gender' => $this->faker->randomElement(['M', 'F']),
            'teacher_id' => $this->faker->randomElement(Teacher::pluck('id')),
            'created_at' => now(),
        ];
    }
}
