mod foo;
mod bar;
mod qux;
mod tests;

use foo::Foo;

use crate::bar::Bar;

fn main() {
    let bar_instance = Bar;
    let foo_instance = Foo::new("Foo", bar_instance);
    println!("{}", foo_instance.hello());
}
