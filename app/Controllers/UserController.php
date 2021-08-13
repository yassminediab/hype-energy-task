<?php
require_once 'app/requests/validations.php';

class UserController
{
    /**
     * @var UserServiceInterface
     */
    protected $service;

    /**
     * UserController constructor.
     * @param UserServiceInterface $service
     */
    public function __construct(UserServiceInterface $service)
    {
        $this->service = $service;
    }


    public function viewRegisterForm() {
        include 'views/register.php';
    }

    /**
     * @param $input
     */
    public function register(array $input)
    {
        $errors = validateRegister($input);

        if (!empty($errors)) {
            include 'views/register.php';
            return;
        }

        $response  = $this->service->register($input);

        if (isset($response['errors']) && !empty($response['errors'])) {
            $errors = $response['errors'];
            include 'views/register.php';
            return;
        }
        $success = true;
        include 'views/register.php';
    }

    public function viewLoginForm() {
        include 'views/login.php';
    }

    /**
     * @param $input
     */
    public function login(array $input)
    {
        $errors = validateLogin($input);

        if (!empty($errors)) {
            include 'views/login.php';
            return;
        }
        $user = $this->service->login($input['email'], $input['password']);

        if (!$user) {
            $errors = ['invalid username or password'];

            include 'views/login.php';
            return;
        }

        $_SESSION['userId'] = $user->getId();

        header('Location: list.php');
    }

    public function listUsers()
    {
        $users = $this->service->listUsers();

        include 'views/list.php';
    }

    public function logout() : ?User
    {
        unset($_SESSION['userId']);

        header('Location: login.php');
    }
}
