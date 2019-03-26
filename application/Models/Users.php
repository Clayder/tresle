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
     * @var \Zend\EventManager\EventManager
     */
    private $events;

    /**
     * Users constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->db     = $container['db'];
        $this->events = $container['events'];
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

    /**
     * @param array $data
     */
    public function create(array $data)
    {
        $this->events->trigger('creating.users', null, $data);
        // Inserir no banco de dados
        $this->events->trigger('created.users', null, $data);
    }
}