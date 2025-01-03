<?php

class User
{
    const ROLE_ADMIN = 'admin_role';
    const ROLE_EDITOR = 'editor_role';
    const ROLE_VIEWER = 'viewer_role';

    private $username;
    private $email;
    private $role;

    public function __construct(
        $username,
        $email,
        $role,
    ) {
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getInfo()
    {
        echo "username: $this->username; role: $this->role";
        echo "<br>";
    }
}

class Admin extends User
{
    private $permissions = ["manage_users", "edit_content", "delete_content"];

    public function getPermissions()
    {
        return $this->permissions;
    }
}

class Editor extends User
{
    private $permissions = ["edit_content", "delete_content"];

    public function getPermissions()
    {
        return $this->permissions;
    }
}

class Viewer extends User
{
    private $permissions = ["view_content"];

    public function getPermissions()
    {
        return $this->permissions;
    }
}

class UserManager
{
    private $users = [];

    public function addUser(User $user)
    {
        $this->users[] = $user;
    }
    public function getUsersByRole($role)
    {
        foreach ($this->users as $user) {
            if ($user->getRole() === $role) {
                $user->getInfo();
                echo "<br>";
            }
        }
    }
    public function printUserPermission($username)
    {
        foreach ($this->users as $user) {
            if ($user->getUsername() === $username) {
                echo "$username permissions: <br>";
                foreach ($user->getPermissions() as $permission) {
                    echo "- $permission<br>";
                }
                echo "<br>";
            }
        }
    }
}

$users = [
    new Admin("Tom", "tom@gmail.com", User::ROLE_ADMIN),
    new Editor("Amanda", "amanda@gmail.com", User::ROLE_EDITOR),
    new Viewer("John", "john@mail.com", User::ROLE_VIEWER),
];
$userManager = new UserManager;

foreach ($users as $user) {
    $userManager->addUser($user);
}

echo '$users array:' . '<br>';
print_r($users);
echo '<br><br>---<br><br>';

echo 'command: $userManager->getUsersByRole("admin_role");' . '<br>';
echo 'output: ';
$userManager->getUsersByRole("admin_role");
echo '<br><br>---<br><br>';

echo 'command: $userManager->getUsersByRole("viewer_role");' . '<br>';
echo 'output: ';
$userManager->getUsersByRole("viewer_role");
echo '<br><br>---<br><br>';

echo 'command: $userManager->printUserPermission("Amanda");' . '<br>';
echo 'output: ';
$userManager->printUserPermission("Amanda");
echo '<br><br>---<br><br>';
