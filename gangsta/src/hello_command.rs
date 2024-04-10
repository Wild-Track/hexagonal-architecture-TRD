use crate::Robot;

pub struct HelloCommand {
    robot: Robot,
}

impl HelloCommand {
    pub fn new(robot: Robot) -> HelloCommand {
        HelloCommand { robot }
    }

    pub fn execute(&self) -> String {
        self.robot.hello()
    }
}
