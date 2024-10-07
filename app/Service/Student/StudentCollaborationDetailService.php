<?php

declare(strict_types=1);

namespace App\Service\Student;

use App\Exceptions\ResumeNotFoundException;
use App\Exceptions\StudentNotFoundException;
use App\Models\Student;
use App\Models\Collaboration;

class StudentCollaborationDetailService
{
    public function execute(string $studentId): array
    {
        return $this->getCollaborationDetails($studentId);
    }

    public function getCollaborationDetails(string $studentId): array
    {
		
        $student = Student::find($studentId);

        if (!$student) {
            throw new StudentNotFoundException($studentId);
        }
		
        $resume = $student->resume()->first();
		
        if (!$resume) {
            throw new ResumeNotFoundException($studentId);
        }
		
		//Thanks To Ivan For Following Line, which I modified a little
        //$collaborations = $student->resume?->collaborations ?? collect();
		//$collaborations = $resume->collaborations ?? collect();
		$collaborations = $resume->collaborations->collect();
		
        return $this->mapCollaborationsDetails($collaborations);
    }

    private function mapCollaborationsDetails(object $collaborations): array
    {
        return $collaborations->map(function ($collaboration) {
            return [
                'uuid' => $collaboration->id,
                'collaboration_name' => $collaboration->collaboration_name,
                'collaboration_description' => $collaboration->collaboration_description,
                'collaboration_quantity' => $collaboration->collaboration_quantity,
            ];
        })->toArray();
    }
}
