<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $taskTitles = [
            'Completare il report mensile',
            'Organizzare meeting con il cliente',
            'Aggiornare il sito web aziendale',
            'Preparare presentazione',
            'Controllare inventario magazzino',
            'Rispondere alle email urgenti',
            'Pianificare campagna marketing',
            'Testare nuova funzionalita',
            'Scrivere documentazione tecnica',
            'Organizzare formazione team',
            'Analizzare dati vendite',
            'Contattare fornitori',
            'Aggiornare database clienti',
            'Preparare budget annuale',
            'Ottimizzare processo produttivo',
            'Creare contenuti social media',
            'Verificare conformita normative',
            'Organizzare evento aziendale',
            'Migliorare UX del prodotto',
            'Pianificare strategia espansione',
            'Revisione codice progetto',
            'Backup sistemi IT',
            'Training nuovo software',
            'Audit sicurezza dati',
            'Ottimizzazione SEO sito',
        ];

        return [
            'title' => fake()->randomElement($taskTitles),
            'description' => fake()->optional(0.6)->paragraph(1),
            'status' => fake()->randomElement(['pending', 'in_progress', 'completed']),
            'due_date' => fake()->optional(0.7)->dateTimeBetween('now', '+30 days'),
            'created_at' => fake()->dateTimeBetween('-15 days', 'now'),
            'updated_at' => function (array $attributes) {
                return $attributes['created_at'];
            },
        ];
    }

    /**
     * Task completata
     */
    public function completed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'completed',
        ]);
    }

    /**
     * Task urgente con scadenza vicina
     */
    public function urgent(): static
    {
        return $this->state(fn (array $attributes) => [
            'due_date' => fake()->dateTimeBetween('now', '+3 days'),
            'status' => 'pending',
        ]);
    }

    /**
     * Task scaduta
     */
    public function overdue(): static
    {
        return $this->state(fn (array $attributes) => [
            'due_date' => fake()->dateTimeBetween('-10 days', '-1 day'),
            'status' => fake()->randomElement(['pending', 'in_progress']),
        ]);
    }
}