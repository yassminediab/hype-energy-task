<?php

class SQLUserRepository  implements UserRepositoryInterface
{
    /**
     * @var QueryBuilder
     */
    protected $queryBuilder;

    public function __construct(QueryBuilder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    /**
     * @param User $user
     */
    public function register(User $user)
    {
        $this->queryBuilder->insert("users", $user->toArray());
    }

    /**
     * @param string $email
     * @return User|null
     */
    public function getUserByEmail(string $email): ?User
    {
        if($user = $this->queryBuilder->selectOne("users", ['email' => $email])) {
            return new User($user);
        }
        return null;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->queryBuilder->selectAll("users");
    }
}
