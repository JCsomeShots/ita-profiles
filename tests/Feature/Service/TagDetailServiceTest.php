<?php

declare(strict_types=1);

namespace Tests\Feature\Service;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Tag;
use App\Service\TagDetailService;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class TagDetailServiceTest extends TestCase
{
    use DatabaseTransactions;

    protected $tagDetailService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tagDetailService = new TagDetailService();
    }
    public function testExecuteReturnsExpectedData(): void
    {
        $tag = Tag::factory()->create([
            'tag_name' => 'Test Tag',
        ]);

        $data = $this->tagDetailService->execute((string)$tag->id);

        $this->assertEquals([
            'id' => $tag->id,
            'tag_name' => $tag->tag_name,
            'created_at' => $tag->created_at,
            'updated_at' => $tag->updated_at,
        ], $data);
    }

    public function testTagDetailsNotFound() : void
    {

        $nonExistentTagId = 'non-existent-tag-id';

        $this->expectException(ModelNotFoundException::class);
        $this->tagDetailService->execute($nonExistentTagId);
    }

}