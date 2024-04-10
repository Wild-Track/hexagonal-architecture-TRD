
pub struct Foo<B: Printer> {
    name: String,
    printer_instance: B,
}

impl<B: Printer> Foo<B> {
    pub fn new(name: &str, printer_instance: B) -> Self {
        Foo {
            name: String::from(name),
            printer_instance,
        }
    }

    pub fn hello(&self) -> String {
        self.printer_instance.print(&self.name)
        // format!("{} says: {}", self.name, message)
    }
}

pub trait Printer {
    fn print(&self, message: &str) -> String;
}

// #[cfg(test)]
// mod tests {
//     use super::*;

//     struct BarTest;

//     impl BarTrait for BarTest {
//         fn print(&self, message: &str) -> String {
//             format!("{}", message)
//         }
//     }

//     #[test]
//     fn test_hello_method() {
//         let mock_bar = BarTest;
//         let foo: Foo<_> = Foo::new("Foo", mock_bar);
//         assert_eq!(foo.hello(), "Foo says: Hello!");
//     }
// }
