<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Proyecto;

class ProyectoControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the index method.
     *
     * @return void
     */
    public function testIndex()
    {
        // Create some sample data in the database
        factory(Proyecto::class, 10)->create();

        // Send a GET request to the index method
        $response = $this->get(route('proyectos.index'));

        // Assert that the response has a status code of 200 (OK)
        $response->assertStatus(200);

        // Assert that the response contains the sample data
        $response->assertJsonCount(10, 'data');
    }
     /**
     * Test the store method.
     *
     * @return void
     */
    public function testStore()
    {
        // Set the request data
        $data = [
            'name' => 'Test Proyecto',
            'description' => 'A test proyecto description',
            'github_link' => 'https://github.com/test-proyecto',
            'link' => 'https://test-proyecto.com',
            'image' => 'https://test-proyecto.com/image.jpg',
            'technologies' => 'Laravel, Vue.js, Tailwind CSS',
        ];

        // Send a POST request to the store method
        $response = $this->post(route('proyectos.store'), $data);

        // Assert that the response has a status code of 201 (Created)
        $response->assertStatus(201);

        // Assert that the response contains the request data
        $response->assertJson($data);

        // Assert that the proyecto was saved in the database
        $this->assertDatabaseHas('proyectos', $data);
    }

    /**
     * Test the show method of the ProyectoController.
     *
     * @return void
     */

    public function testShow()
    {
        // Create a project instance in the database
        $proyecto = factory(Proyecto::class)->create();

        // Call the show method of the ProyectoController
        $response = $this->get(route('proyectos.show', ['proyecto' => $proyecto->id]));

        // Check if the response has the correct status code (200)
        $response->assertStatus(200);

        // Check if the response data matches the project instance
        $response->assertExactJson($proyecto->toArray());
    }
}

