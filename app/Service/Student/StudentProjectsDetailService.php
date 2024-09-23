<?php

declare(strict_types=1);

namespace App\Service\Student;

use App\Models\Student;
use App\Models\Project;
use App\Models\Tag;
use App\Exceptions\StudentNotFoundException;
use App\Exceptions\ResumeNotFoundException;
use Illuminate\Database\Eloquent\Collection;

class StudentProjectsDetailService
{

    public function execute(string $studentId):array
    {
        $student = $this->getStudent($studentId);
        $resume = $this->getResume($student);
        $projects = $this->getProjects($resume);

        return $this->formatProjectsDetail(projects: $projects);
    }

    private function getStudent(string $studentId):Student
    {
        $student = Student::where('id', $studentId)->with('resume')->first();

        if (!$student) {
            throw new StudentNotFoundException($studentId);
        }

        return $student;
    }

    private function getResume(object $student):mixed
    {
        $resume = $student->resume;

        if (!$resume) {
            throw new ResumeNotFoundException($student->id);
        }

        return $resume;
    }

    private function getProjects(object $resume):Collection
    {
        return $resume->projects;
    }

    private function formatProjectsDetail(Collection $projects):array
    {
        return $projects->map(function ($project): array {
                return [
                    'uuid' => $project->id,
                    'project_name' => $project->name,
                    'company_name' => $project->company_name,
                    'project_url' => $project->project_url,
                    'tags' => $project->tags->map(callback: function ($tag): array {
                        return [
                            'id' => $tag->id,
                            'name' => $tag->tag_name,
                        ];
                    })->toArray(),
                    'github_url' => $project->github_url,
                ];
            })->toArray();
    }
}
