
#[cfg(test)]
mod tests {

    use crate::bar::Bar;
    use crate::foo::Foo;
    use crate::qux::Qux;

    #[test]
    fn test_hello_method() {
        let mock_bar = Bar;
        let foo: Foo<_> = Foo::new("Foo", mock_bar);
        assert_eq!(foo.hello(), "Foo says: Hello!");

        let mock_qux = Qux;
        let foo_qux: Foo<_> = Foo::new("Foo", mock_qux);
        assert_eq!(foo_qux.hello(), "Foo dit: Bonjour!");
    }
}
