<?php

namespace App\Models;

use Pimple\Container;


class Users
{
    /**
     * @var \PDO
     */
    private $db;

    /**
     * Users constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->db = $container['db'];
    }

    /**
     * @param int $id
     */
    public function get($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM `users` WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}