<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Student;
use App\Models\AdditionalTraining;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Cache;

class ResumeFactory extends Factory
{
    public const  SUBTITLES = [
        "Ingeniero de Software",
        "Full Stack developer en PHP",
        "Frontend developer React",
        "Backend developer Java",
        "Analista de Datos",
    ];

    public function definition(): array
    {
        $developmentOptions = ['Spring', 'Laravel', 'Angular', 'React', 'Not Set'];
        $development = $this->faker->randomElement($developmentOptions);

        // I THINK THIS CAN ALSO BE REMOVED, is not used.
        $additionalTrainingsIds = AdditionalTraining::factory()->count(2)->create()->pluck('id')->toArray();

        // TEMPORARY: This is used to create add the two users to the first two students.
        static $studentIndex = 0; // Keep track of the number of students created
        $userIds = Cache::get('test_user_ids', []);
        // Assign a user ID to the first students, then default to null
        $userId = ($studentIndex < count($userIds)) ? $userIds[$studentIndex] : null;
        $studentIndex++; // Increment the index for each student created

        $gitHubUsername = ['nachoa88', 'StephaneCarteaux'];

        return [
            'student_id' => Student::factory()->create([
                'user_id' => $userId, // This will be null after the first two students
            ])->id,
            'subtitle' => $this->faker->randomElement(self::SUBTITLES),
            'linkedin_url' => 'https://linkedin.com/' . $this->faker->userName,
            'github_url' => 'https://github.com/' . $this->faker->randomElement($gitHubUsername),
            'specialization' => $this->faker->randomElement(
                ['Frontend', 'Backend', 'Fullstack', 'Data Science', 'Not Set'],
            ),
            'development' => $development,
            'about' => $this->faker->paragraph,
            'modality' => $this->faker->randomElements(['Presencial', 'Híbrid', 'Remot'], rand(1, 3)),
        ];
    }

    public function specificSpecialization(string $specialization): Factory
    {
        return $this->state(function (array $attributes) use ($specialization) {
            return [
                'specialization' => $specialization,
            ];
        });
    }

    public function specificDevelopment($data): Factory
    {
        return $this->state(function (array $attributes) use ($data) {
            return [
                'development' => $data,
            ];
        });
    }
}
