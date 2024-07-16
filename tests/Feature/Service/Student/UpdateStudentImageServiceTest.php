<?php

namespace Tests\Unit\Service\Student;

use App\Models\Student;
use App\Service\Student\UpdateStudentImageService;
use App\Exceptions\StudentNotFoundException;
use App\Http\Controllers\api\Student\UpdateStudentImageController;
use App\Http\Requests\UpdateImageStudentRequest;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UpdateStudentImageServiceTest extends TestCase
{
    use DatabaseTransactions;
	
	protected UpdateStudentImageService $studentUpdateImageService;
	private string $photos_path = 'public/photos/';
	
	
    protected function setUp(): void
    {
        parent::setUp();

        $this->studentUpdateImageService = new UpdateStudentImageService();
    }
    
	
	
    /** @test */
    public function it_updates_student_image_path_in_database()
    {
        $student = Student::factory()->create();
        $studentId = $student->id;

        $initialPhoto = 'old_image.png';
        $student->photo = $initialPhoto;
        $student->save();

        $file = UploadedFile::fake()->image('test_image.png');
        $filename = 'new_image.png';

        $this->studentUpdateImageService->updateStudentImagePathInDatabaseByStudentID($studentId, $filename);

        $student->refresh();
        $this->assertEquals($filename, $student->photo);

        if ($initialPhoto) {
            $this->assertFalse(Storage::disk('public')->exists('photos/' . $initialPhoto));
        }
    }

    /** @test */
    public function it_throws_exception_if_student_not_found()
    {
        $nonExistingStudentId = 'non_existing_id';
        $filename = 'new_image.png';
        
        $this->expectException(StudentNotFoundException::class);
        $this->studentUpdateImageService->updateStudentImagePathInDatabaseByStudentID($nonExistingStudentId, $filename);
    }

    /** @test */
    public function it_stores_photo_in_storage_by_filename()
    {
		$file = UploadedFile::fake()->image('test_image.png');
		$filename = 'test_image.png';

		$this->studentUpdateImageService->storePhotoInStorageByFileName($file, $filename);

		$this->assertTrue(Storage::disk('public')->exists('photos/' . $filename));
    }


}
