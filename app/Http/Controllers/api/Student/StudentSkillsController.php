<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\Student;

use Exception;
use App\Http\Controllers\Controller;
use App\Service\Student\StudentSkillsService;
use App\Exceptions\StudentNotFoundException;
use App\Exceptions\ResumeNotFoundException;
use Illuminate\Http\JsonResponse;

use App\Http\Requests\SkillsRequest;


class StudentSkillsController extends Controller
{
    private StudentSkillsService $studentSkillsService;

    public function __construct(StudentSkillsService $studentSkillsService)
    {
        $this->StudentSkillsService = $studentSkillsService;
    }

    public function __invoke(SkillsRequest $request, string $studentId): JsonResponse
    {
        try {
			//Check if body skills field is a valid JSON
			if($this->StudentSkillsService->fieldIsValidSkillsJson($request->skills) != True)
			{
				return response()->json(['status' => 'failure'], 402);
			}
			
			
            $service = $this->StudentSkillsService->updateSkillsByStudentId($studentId, $request->skills);
            //return response()->json(['modality' => $service]);
            if($service == True){
				return response()->json(['skills' => $request->skills, 'status' => 'success'], 204);
			}else{
				return response()->json(['status' => 'failure'], 401);
			}
            
            
        } catch (StudentNotFoundException | ResumeNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?: 500);
        }
    }
}
