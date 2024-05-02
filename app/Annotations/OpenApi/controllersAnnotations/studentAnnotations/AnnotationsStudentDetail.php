<?php

namespace App\Annotations\OpenApi\controllersAnnotations\studentAnnotations;

class AnnotationsStudentDetail
{
    /**
     * @OA\Get (
     *     path="/student/{id}/detail/for-home",
     *     operationId="getStudentDetailsabout",
     *     tags={"Student"},
     *     summary="Obtener detalles de un estudiante.",
     *     description="Obtiene los detalles de un estudiante específico. No se requiere autenticación.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del estudiante",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Éxito. Devuelve los detalles del estudiante.",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="fullname", type="string", example="Katrine Wyman Jacobson"),
     *                     @OA\Property(property="subtitle", type="string", example="Full Stack developer en PHP"),
     *                     @OA\Property(
     *                         property="social_media",
     *                         type="object",
     *                         @OA\Property(
     *                             property="github",
     *                             type="object",
     *                             @OA\Property(property="url", type="string", example="https://github.com/bettie52")
     *                         ),
     *                         @OA\Property(
     *                             property="linkedin",
     *                             type="object",
     *                             @OA\Property(property="url", type="string", example="https://linkedin.com/abernathy.dayne")
     *                         )
     *                     ),
     *                     @OA\Property(property="about", type="string", example="Iusto aut debitis soluta facere tempore quisquam. Vel assumenda aliquid quod et eum quos ex. Ipsa ea tempora minima occaecati. Culpa occaecati quod laboriosam reiciendis quia consequuntur."),
     *                     @OA\Property(
     *                         property="tags",
     *                         type="array",
     *                         @OA\Items(
     *                             @OA\Property(property="id", type="integer", example=4),
     *                             @OA\Property(property="name", type="string", example="HTML&CSS")
     *                         )
     *                     )
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuario no encontrado."
     *     )
     * )
     */
    public function show() {}
}
