mod robot;
mod hello_command;
mod command;

use robot::Robot;
use hello_command::HelloCommand;

fn main() {
    let my_robot = Robot::new("Deez");
    let hello_command = HelloCommand::new(my_robot);
    let result = hello_command.execute();
    println!("{}", result);
}

#[cfg(test)]
mod tests {
    use super::*;

    #[test]
    fn test_hello_command_execute() {
        let my_robot = Robot::new("Nuts");
        let hello_command = HelloCommand::new(my_robot);
        assert_eq!(hello_command.execute(), "Nuts says \"Hello World\"");
    }
}
