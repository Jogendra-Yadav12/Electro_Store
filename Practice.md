<?php
require_once 'UserModel.php';

class UserController {
    public function index() {
        $userModel = new UserModel();
        $users = $userModel->getUsers();
        include 'views/user_list.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $userModel = new UserModel();
            $userModel->addUser($username, $email);
            header("Location: index.php");
        } else {
            include 'views/add_user_form.php';
        }
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $userModel = new UserModel();
            $userModel->updateUser($id, $username, $email);
            header("Location: index.php");
        } else {
            $userModel = new UserModel();
            $user = $userModel->getUserById($id);
            include 'views/update_user_form.php';
        }
    }

    public function delete($id) {
        $userModel = new UserModel();
        $userModel->deleteUser($id);
        header("Location: index.php");
    }
}





Models

<?php
require_once 'config.php';

class UserModel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getUsers() {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        $users = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }

    public function addUser($username, $email) {
        $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUser($id, $username, $email) {
        $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id=$id";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}


Config file


<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'username');
define('DB_PASS', 'password');
define('DB_NAME', 'database_name');





query sring data

<?php
// Define your routes
$routes = [
    '/' => 'HomeController@index',
    '/users' => 'UserController@index',
    '/users/add' => 'UserController@add',
    '/users/edit' => 'UserController@edit',
    // Add more routes as needed
];

// Get the current route from the URL
$route = $_SERVER['REQUEST_URI'];

// Check if the route exists in the defined routes
if (array_key_exists($route, $routes)) {
    // Extract the controller and action from the route
    list($controllerName, $actionName) = explode('@', $routes[$route]);

    // Require the controller file
    require_once 'controllers/' . $controllerName . '.php';

    // Create an instance of the controller
    $controller = new $controllerName();

    // Call the action method
    $controller->$actionName();
} elseif (strpos($route, '/users/edit') === 0) {
    // Route for editing user
    $parts = explode('=', $route);
    $id = isset($parts[1]) ? $parts[1] : null;
    if ($id) {
        require_once 'controllers/UserController.php';
        $controller = new UserController();
        $controller->edit($id);
    } else {
        echo "Invalid route";
    }
} else {
    // Handle 404 - Route not found
    echo "404 Not Found";
}
?>
