<?php

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    protected $repo;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $repo
     */
    public function __construct(UserRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param array $input
     * @return bool[]|string[][]
     */
    public function register(array $input): array
    {
        $user = new User();

        $user->setEmail($input['email'])->setName($input['username'])->setPassword($input['password']);

        if($this->repo->getUserByEmail($user->getEmail())) {
            return ['errors' => ['Email already exists']];
        }
        $this->repo->register($user);

        return ['success' => true];
    }

    /**
     * @param string $email
     * @param string $password
     * @return false|User
     */
    public function login(string $email, string $password)
    {
        if ($user = $this->repo->getUserByEmail($email)) {
            if (password_verify($password, $user->getPassword())) {
                return $user;
            }
            return null;
        }
        return null;
    }

    public function listUsers(): array
    {
        return $this->repo->get();
    }
}
