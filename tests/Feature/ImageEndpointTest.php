<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImageEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_that_upload_works_for_right_files_type()
    {
        Storage::fake('image');

        $file = UploadedFile::fake()->image('image.png');

        $response = $this->postJson('/api/v1/image', [
            'file' => $file
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
    }

    public function test_that_upload_fails_for_wrong_files_size()
    {
        Storage::fake('image');

        $file = UploadedFile::fake()->image('image.png')->size(6000);

        $response = $this->postJson('/api/v1/image', [
            'file' => $file
        ]);

        $response->assertStatus(400)
            ->assertJson([
                'success' => false
            ]);
    }
}
