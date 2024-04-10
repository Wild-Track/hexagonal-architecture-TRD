// pub trait BarTrait {
//     fn print(&self, message: &str) -> String;
// }
use crate::foo::Printer;

pub struct Qux;

impl Printer for Qux {
    fn print(&self, message: &str) -> String {
        format!("{} dit: Bonjour!", message)
    }
}
