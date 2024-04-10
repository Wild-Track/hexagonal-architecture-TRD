// pub trait BarTrait {
//     fn print(&self, message: &str) -> String;
// }
use crate::foo::Printer;

pub struct Bar;

impl Printer for Bar {
    fn print(&self, message: &str) -> String {
        format!("{} says: Hello!", message)
    }
}
