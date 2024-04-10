pub struct Robot {
    name: String,
}

impl Robot {
    pub fn new(name: &str) -> Robot {
        Robot {
            name: String::from(name),
        }
    }

    pub fn hello(&self) -> String {
        format!("{} says \"Hello World\"", self.name)
    }
}
