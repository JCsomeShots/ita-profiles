<?php 
namespace App\Annotations\OpenApi\controllersAnnotations\additionalTrainingAnnotations;

class AnnotationsAdditionalTraining
{
/**
 * @OA\Get(
 *     path="/students/{uuid}/additionaltraining",
 *     operationId="getStudentAdditionalTraining",
 *     summary="Retrieve a list of additional training",
 *     tags={"Additional Training"},
 * 
 * 
*          @OA\Parameter(
*          name="uuid",
*          description="Student UUID",
*          required=true,
*          in="path",
*          @OA\Schema(
*              type="string",
*              format="uuid"
*          )
*      ),
 * 
 *     @OA\Response(
 *         response=200,
 *         description="Successful. Additional training list retrieved",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="additionalTraining",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="id", type="uuid"),
 *                     @OA\Property(property="course_name", type="string"),
 *                     @OA\Property(property="study_center", type="string"),
 *                     @OA\Property(property="course_beggining_year", type="integer"),
 *                     @OA\Property(property="course_ending_year", type="integer"),
 *                     @OA\Property(property="duration_hrs", type="integer"),
 *                 )
 *             )
 *         )
 *     )
 * )
 */


    public function __invoke(){}
}