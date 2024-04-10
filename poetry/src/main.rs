mod app;
mod domain;
mod infrastructure;
mod traits;

use crate::{app::App, infrastructure::persistence::file_system::poems_in_file_system::PoemsInFileSystem};

fn main() {
    let poems_service = PoemsInFileSystem::new();
    let app = App::new(poems_service);
    println!("Hello, world!");
}


// Explications:
// Controller qui utilise une interface provenant du service  (ici App)
// Service (c'est le service qui dicte les différentes actions et les reporte sous forme de save, update ... au repository) (Ici Poem)
// Persistance qui utilise une interface provenant du service (Ici PoemsInFileSystem)
