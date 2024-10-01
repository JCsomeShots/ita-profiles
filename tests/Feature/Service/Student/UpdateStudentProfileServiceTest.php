<?php
declare(strict_types=1);

namespace Tests\Feature\Service\Student;

use App\Models\{
    Resume,
    Student
};
use Illuminate\Foundation\Testing\{
    DatabaseTransactions
};
use App\Service\Student\UpdateStudentProfileService;
use Tests\TestCase;
use App\Exceptions\{
    StudentNotFoundException,
    ResumeNotFoundException
};
use Illuminate\Database\QueryException;

class UpdateStudentProfileServiceTest extends TestCase
{
    use DatabaseTransactions;
    private UpdateStudentProfileService $updateStudentProfileService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->updateStudentProfileService = new UpdateStudentProfileService();
    }

    private function createFakeDataToUpdate(Student $student): array
    {
        $studentData = $student->only(['id', 'name', 'surname']);
        if ($student->resume) {
            $resumeData = $student->resume->only(['subtitle', 'github_url', 'linkedin_url', 'about', 'subtitle', 'tags_ids']);
            return array_merge($studentData, $resumeData);
        } else {
            return $studentData;
        }
    }

    public function test_can_update_student_profile()
    {
        $student = Student::factory()->has(Resume::factory())->create();
        $dataToUpdate = $this->createFakeDataToUpdate($student);

        $this->updateStudentProfileService->execute($student, $dataToUpdate);

        $this->assertDatabaseHas('students', [
            'id' => $student->id,
            'name' => $dataToUpdate['name'],
            'surname' => $dataToUpdate['surname'],
        ]);

        $resume = Resume::where('student_id', $dataToUpdate['id'])->first();

        $this->assertEquals($dataToUpdate['subtitle'], $resume->subtitle);
        $this->assertEquals($dataToUpdate['github_url'], $resume->github_url);
        $this->assertEquals($dataToUpdate['linkedin_url'], $resume->linkedin_url);
        $this->assertEquals($dataToUpdate['about'], $resume->about);
        $this->assertEquals($dataToUpdate['tags_ids'], ($resume->tags_ids));
    }

    public function test_update_student_profile_student_not_found()
    {

        $nonExistentStudentId = 12345;

        $response = $this->put(route('student.updateProfile', ['student' => $nonExistentStudentId]));

        $response->assertJson(['message' => 'No query results for model [App\Models\Student] ' . $nonExistentStudentId]);
    }

    public function test_update_student_profile_throws_resume_not_found_exception()
    {
        $this->expectException(ResumeNotFoundException::class);

        $student = Student::factory()->create();
        $dataToUpdate = $this->createFakeDataToUpdate($student);

        $this->updateStudentProfileService->execute($student, $dataToUpdate);
    }
}
