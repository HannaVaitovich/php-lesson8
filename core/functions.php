<?php
define('USERS_FILE', __DIR__ . '/../data/users.json');

function login($login, $password) {
    $user = getUser($login);
    if (!$user || $user['password'] != $password) {
        return false;
    } else {
        unset($user['password']);
        $_SESSION['user'] = $user;
        return true;
    }
}

function guest($username) {
    if (!empty($_POST['username'])) {
        $_SESSION['user'] = ['username' => $username];
        return true;
    }
}

function isPost() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function getParam($name) {
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
}

function getUsers() {
    if (!file_exists(USERS_FILE)) {
        return [];
    }
    $fileData = file_get_contents(USERS_FILE);
    $users = json_decode($fileData, true);

    if (!$users) {
        return [];
    }
    return $users;
}

function getUser($login) {
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['login'] == $login) {
            return $user;
        }
    }
    return null;
}

function isAuthorized() {
    return !empty($_SESSION['user']);
}

function getAuthorizedUser() {
    return isset($_SESSION['user']) ? $_SESSION['user'] : null;
}

function isGuest() {
    return isset($_SESSION['user']) && !isset($_SESSION['user']['login']);
}

function addUser($login, $password, $username) {
    $users = getUsers();
    $users[] = [
    "id" => getMaxUserId() + 1,
    "login" => $login,
    "password" => $password,
    "username" => $username,
    ];
    var_dump($users); die;

    $json = json_encode($users, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    return file_put_contents(USERS_FILE, $json);
}

function getMaxUserId()
{
    $users = getUsers();
    $ids = array_column($users, 'id');
    return max($ids);
}

function redirect($page) {
    header("Location: $page.php");
    die;
}

function logout() {
    if (isAuthorized()) {
        session_destroy();
    }
    redirect('login');
}


