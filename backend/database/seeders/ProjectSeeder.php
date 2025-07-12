<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = $this->projects();

        foreach($projects as $key => $project){
            Project::create([
                'name' => $project['name'],
                'image' => $project['image'],
                'url' => $project['url'],
                'description_ITA' => $project['description_ITA'],
                'description_ESP' => $project['description_ESP'],
                'description_ENG' => $project['description_ENG'],
                'curriculum_ITA' => $project['curriculum_ITA'],
                'curriculum_ESP' => $project['curriculum_ESP'],
                'curriculum_ENG' => $project['curriculum_ENG'],
                'dev_languages' => $project['dev_languages'],
                'order' => $key + 1,
                'status' => $project['status'],  
            ]);
        }
    }


    private function projects()
    {
        $stateWorking = config('setting.projectsStates.working');
        $stateStopped = config('setting.projectsStates.stopped');

        return array(
            [
                'name' => 'Dichatlon',
                'image' => 'logo_dichatleon.webp',
                'url' => 'https://carloloidev.com/Project_Shop/home',
                'description_ITA' => "Progetto che simula una piattaforma per la vendita e l'acquisto di prodotti. Potrai registrarti come AMMINISTRATORE per aggiungere nuovi articoli o modificare quelli esistenti!",
                'description_ESP' => "Proyecto que simula una plataforma para la compra y venta de productos. Podrás registrarte como ADMINISTRADOR para añadir nuevos artículos o modificar los ya existentes!",
                'description_ENG' => "A project simulating a platform for buying and selling products. You can register as an ADMINISTRATOR to add new items or edit existing ones!",
                'curriculum_ITA' => "Simulatore interattivo di un sito per la vendita di prodotti, progettato per replicare un'esperienza di e-commerce completa e user-friendly.",
                'curriculum_ESP' => "Simulador interactivo de un sitio para la venta de productos, diseñado para replicar una experiencia de comercio completa y fácil de usar.",
                'curriculum_ENG' => "Interactive simulator of a website for product sales, designed to replicate a complete and user-friendly e-commerce experience",
                'dev_languages' => "13,16",
                'status' => $stateWorking,
            ],
            [
                'name' => 'Faceback',
                'image' => 'logo_faceback.jpg',
                'url' => 'https://carloloidev.com/Project_Social',
                'description_ITA' => "Progetto che simula una piattaforma social con funzionalità di chat, richieste di amicizia, profili privati o pubblici e la possibilità di condividere immagini e video accompagnati da commenti e like!",
                'description_ESP' => "Proyecto que simula una plataforma social con funciones de chat, solicitudes de amistad, perfiles privados o públicos y la posibilidad de compartir imágenes y videos con comentarios y likes!",
                'description_ENG' => "A project simulating a social platform with features like chat, friend requests, private or public profiles and the ability to share images and videos with comments and likes!",
                'curriculum_ITA' => "Social network ispirato a Facebook, progettato per offrire funzionalità di connessione tra utenti, con aggiornamenti in tempo reale e un'interfaccia user-friendly.",
                'curriculum_ESP' => "Red social inspirada en Facebook, diseñada para ofrecer funciones de conexión entre usuarios, con actualizaciones en tiempo real y una interfaz fácil de usar.",
                'curriculum_ENG' => "Social network inspired by Facebook, designed to offer user connection features, real-time updates, and a user-friendly interface.",
                'dev_languages' => "14,16,4",
                'status' => $stateWorking,
            ],
            [
                'name' => 'SardegnaDream',
                'image' => 'logo_sardegnaDream.jpg',
                'url' => 'https://carloloidev.com/SardegnaDream',
                'description_ITA' => "Progetto in cui viene simulata la gestione delle prenotazioni per case vacanze. Potrai registrarti come AMMINISTRATORE e avrai la possibilità di aggiungere, modificare o eliminare annunci di case da affittare!",
                'description_ESP' => "Proyecto que simula la gestión de reservas para casas vacacionales. Podrás registrarte como ADMINISTRADOR y tendrás la posibilidad de añadir, modificar o eliminar anuncios de casas para alquilar!",
                'description_ENG' => "A project simulating the management of vacation rental bookings. You can register as an ADMINISTRATOR and will have the ability to add, edit, or delete rental property listings!",
                'curriculum_ITA' => "Simulatore sito per prenotazione di case vacanze in Sardegna, progettato per offrire un'esperienza utente intuitiva e moderna.",
                'curriculum_ESP' => "Simulador de un sitio para la reserva de casas de vacaciones en Cerdeña, diseñado para ofrecer una experiencia de usuario intuitiva y moderna.",
                'curriculum_ENG' => "Simulator of a website for booking holiday homes in Sardinia, designed to provide an intuitive and modern user experience.",
                'dev_languages' => "10,9,14,16",
                'status' => $stateStopped,
            ],
        );
    }
}
