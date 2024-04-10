
pub trait ApplicationDomain {
    fn read(&self, id: &str, title: &str, author_id: &str, all_poems: bool) -> Vec<String>;
}
