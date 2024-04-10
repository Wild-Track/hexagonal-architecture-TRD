pub struct Poem {
    pub id: String,
    pub title: String,
    pub stanzas: Vec<Vec<String>>,
    pub author_id: String,
}

impl Poem {
    pub fn new(id: &str, title: &str, stanzas: Vec<Vec<String>>, author_id: &str) -> Self {
        Poem {
            id: id.to_string(),
            title: title.to_string(),
            stanzas,
            author_id: author_id.to_string(),
        }
    }
}
