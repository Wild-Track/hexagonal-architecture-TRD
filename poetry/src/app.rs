use crate::infrastructure::persistence::file_system::poems_in_file_system::PoemsInFileSystem;

pub struct App {
    poems_service: PoemsInFileSystem,
}

impl App {
    pub fn new(poems_service: PoemsInFileSystem) -> Self {
        App { poems_service }
    }

    pub fn run(&self) {
        
    }
}
