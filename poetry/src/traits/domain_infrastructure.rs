
pub trait DomainInfrastructure {
    
    fn add_poem(&mut self, poem: Poem);

    fn get_poems_list(&self) -> Vec<&Poem>;

    fn get_poem_by_id(&self, id: &str) -> Option<&Poem>;

    fn get_poem_by_title(&self, title: &str) -> Option<&Poem>;

    fn get_poem_by_author_id(&self, author_id: &str) -> Option<&Poem>;
}
