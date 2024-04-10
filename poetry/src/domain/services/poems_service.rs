use crate::traits::application_domain::ApplicationDomain;

pub struct PoemsService {

}

impl ApplicationDomain for PoemsService {
    pub fn new() -> Self {
        
    }
    pub fn read(&self, id: &str, title: &str, author_id: &str, all_poems: bool) -> Vec<String> {
        
    }
}
