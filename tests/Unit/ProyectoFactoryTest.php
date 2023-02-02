<?php

namespace Tests\Unit\Database\Factories;

use App\Models\Proyecto;
use Database\Factories\ProyectoFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class ProyectoFactoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the definition method.
     *
     * @return void
     */
    public function testDefinitionMethod()
    {
        $proyecto = ProyectoFactory::new()->create();

        $this->assertInstanceOf(Proyecto::class, $proyecto);
        $this->assertIsString($proyecto->name);
        $this->assertIsString($proyecto->description);
        $this->assertIsString($proyecto->github_link);
        $this->assertIsString($proyecto->link);
        $this->assertIsString($proyecto->image);
        $this->assertIsString($proyecto->technologies);
    }
    }

