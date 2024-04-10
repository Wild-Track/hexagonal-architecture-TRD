use std::collections::HashMap;
use crate::domain::entities::poem::Poem;
use crate::traits::domain_infrastructure::DomainInfrastructure;


pub struct PoemsInFileSystem {
    poems: HashMap<String, Poem>,
}

impl DomainInfrastructure for PoemsInFileSystem {
    pub fn new() -> Self {
        PoemsInFileSystem {
            poems: HashMap::new(),
        }
    }

    fn add_poem(&mut self, poem: Poem) {
        self.poems.insert(poem.id.clone(), poem);
    }

    fn get_poems_list(&self) -> Vec<&Poem> {
        self.poems.values().collect()
    }

    fn get_poem_by_id(&self, id: &str) -> Option<&Poem> {
        self.poems.get(id)
    }

    fn get_poem_by_title(&self, title: &str) -> Option<&Poem> {
        self.poems.values().find(|&poem| poem.title == title)
    }

    fn get_poem_by_author_id(&self, author_id: &str) -> Option<&Poem> {
        self.poems.values().find(|&poem| poem.author_id == author_id)
    }
}