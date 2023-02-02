<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Proyecto;

class ProyectoControllerTest extends TestCase
{
    use RefreshDatabase;

    /* Test the index method.*/

    public function testIndex()
    {
        // Crear algunos datos de muestra en la base de datos.
        factory(Proyecto::class, 10)->create();

        //Enviar una solicitud GET al método de índice
        $response = $this->get(route('proyectos.index'));

        // Comprueba que la respuesta tiene un código de estado de 200 (OK
        $response->assertStatus(200);

        //Afirmar que la respuesta contiene los datos de muestra

        $response->assertJsonCount(10, 'data');
    }
     /**
     * Test the store method.
     *
     * @return void
     */
    public function testStore()
    {
        // Establecer los datos de la solicitud
        $data = [
            'name' => 'Test Proyecto',
            'description' => 'A test proyecto description',
            'github_link' => 'https://github.com/test-proyecto',
            'link' => 'https://test-proyecto.com',
            'image' => 'https://test-proyecto.com/image.jpg',
            'technologies' => 'Laravel, Vue.js, Tailwind CSS',
        ];

        //Enviar una solicitud POST al método de tienda
        $response = $this->post(route('proyectos.store'), $data);

        //Comprueba que la respuesta tiene un código de estado de 201 (Creado)
        $response->assertStatus(201);

        // Assert that the response contains the request data
        $response->assertJson($data);

        // Afirmar que la respuesta contiene los datos de la solicitud
        $this->assertDatabaseHas('proyectos', $data);
    }

    /**
     * Test the show method of the ProyectoController.*/

    public function testShow()
    {
        // Crear una instancia de proyecto en la base de datos.
        $proyecto = factory(Proyecto::class)->create();

        // Llamar al método show del ProyectoController
        $response = $this->get(route('proyectos.show', ['proyecto' => $proyecto->id]));

        // Compruebe si la respuesta tiene el código de estado correcto (200)
        $response->assertStatus(200);

        //Compruebe si los datos de respuesta coinciden con la instancia del proyecto
        $response->assertExactJson($proyecto->toArray());
    }
    public function testUpdate()
    {
        // Cree un proyecto y consérvelo en la base de datos
        $proyecto = factory(Proyecto::class)->create();

        //Actualice el proyecto y guárdelo
        $request = new Request([
            'name' => 'Updated name',
            'description' => 'Updated description',
            'github_link' => 'https://github.com/updated',
            'link' => 'https://updated.com',
            'image' => 'updated_image.jpg',
            'technologies' => 'Updated technologies',
        ]);

        $controller = new \App\Http\Controllers\ProyectoController();
        $updatedProyecto = $controller->update($request, $proyecto);

        // afirmar que el proyecto se actualizó con éxito.
        $this->assertEquals('Updated name', $updatedProyecto->name);
        $this->assertEquals('Updated description', $updatedProyecto->description);
        $this->assertEquals('https://github.com/updated', $updatedProyecto->github_link);
        $this->assertEquals('https://updated.com', $updatedProyecto->link);
        $this->assertEquals('updated_image.jpg', $updatedProyecto->image);
        $this->assertEquals('Updated technologies', $updatedProyecto->technologies);
    }

    /**
     * Test the destroy method.
     *
     * @return void
     */
    public function testDestroy()
    {
        // Crear un proyecto y conservarlo en la base de datos.
        $proyecto = factory(Proyecto::class)->create();

        //Destruir el proyecto.
        $controller = new \App\Http\Controllers\ProyectoController();
        $response = $controller->destroy($proyecto);

        // Afirmar que el proyecto fue destruido con éxito
        $this->assertEquals(204, $response->getStatusCode());
        $this->assertNull(Proyecto::find($proyecto->id));
    }
}

