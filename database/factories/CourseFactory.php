<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_name' => $this->faker->name(),
            'description' => $this->faker->text('10'),
            'image' => $this->faker->image(),
            'price' => $this->faker->numberBetween($int1=2000, $int2=8000),
            'status' => 1,
            'instructor_id' => 1,
        ];
    }
}
