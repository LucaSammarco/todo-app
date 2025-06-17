<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('it_IT');

        // Prendi tutti gli utenti
        $managers = User::role('manager')->get();
        $employees = User::role('employee')->get();
        $allUsers = $managers->concat($employees);

        $taskTitles = [
    'Completare il report mensile',
    'Organizzare meeting con il cliente',
    'Aggiornare il sito web aziendale',
    'Preparare presentazione per lunedi',
    'Controllare inventario magazzino',
    'Rispondere alle email urgenti',
    'Pianificare campagna marketing',
    'Testare nuova funzionalita app',
    'Scrivere documentazione tecnica',
    'Organizzare formazione team',
    'Analizzare dati vendite Q1',
    'Contattare fornitori per preventivi',
    'Aggiornare database clienti',
    'Preparare budget 2025',
    'Ottimizzare processo produttivo',
    'Creare contenuti social media',
    'Verificare conformita normative',
    'Organizzare evento aziendale',
    'Migliorare UX del prodotto',
    'Pianificare strategia espansione',
    'Sviluppare nuovo prototipo prodotto',
    'Effettuare audit interno',
    'Gestire reclami clienti',
    'Aggiornare software gestionali',
    'Condurre ricerca di mercato',
    'Preparare newsletter aziendale',
    'Monitorare performance KPI',
    'Coordinare spedizioni logistiche',
    'Revisionare contratti fornitori',
    'Implementare misure sicurezza IT',
    'Pianificare turni personale',
    'Analizzare feedback utenti',
    'Ottimizzare SEO sito web',
    'Gestire budget pubblicitario',
    'Sviluppare piano crisi aziendale',
    'Formare nuovo personale',
    'Aggiornare policy aziendali',
    'Condurre test qualità prodotto',
    'Pianificare manutenzione attrezzature',
    'Creare report finanziario trimestrale',
];

        $statuses = ['pending', 'completed', 'in_progress'];

        foreach ($taskTitles as $title) {
            // SOLO I MANAGER creano le task
            $creator = $managers->isNotEmpty()
                ? $managers->random()
                : User::first(); // fallback se non ci sono manager

            // TUTTE le task assegnate agli employee
            $assignee = $employees->isNotEmpty()
                ? $employees->random()
                : User::first(); // fallback se non ci sono employee

            // Date casuali
            $createdAt = $faker->dateTimeBetween('-15 days', 'now');
            $dueDate = $faker->dateTimeBetween('now', '+20 days');

            Task::create([
                'title' => $title,
                'description' => $faker->paragraph(1),
                'status' => $faker->randomElement($statuses),
                'due_date' => $dueDate,
                'created_by' => $creator->id,
                'assigned_to' => $assignee->id,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);

            $this->command->info("Task creata: {$title} - assegnata a {$assignee->name}");
        }

        $this->command->info("Completato! Create 20 task.");
    }
}