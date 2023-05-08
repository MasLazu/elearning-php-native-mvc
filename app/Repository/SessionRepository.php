<?php

namespace CobaMVC\Repository;

use CobaMVC\Domain\Session;
use CobaMVC\Domain\User;

require_once __DIR__ . "/../Domain/Session.php";

class SessionRepository
{
    private \PDO $connection;

    public function  __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Session $session): void
    {
        $statement = $this->connection->prepare("INSERT INTO sessions(session_id, user_id) VALUES (?, ?)");
        $statement->execute([
            $session->session_id, $session->user_id
        ]);
    }

    public function findBySessionId(string $session_id): ?Session
    {
        $statement = $this->connection->prepare("SELECT id, session_id, user_id FROM sessions WHERE session_id = ?");
        $statement->execute([$session_id]);
        $session = new Session();
        if($row = $statement->fetch()) {
            $session->session_id = $row['session_id'];
            $session->user_id = $row['user_id'];
            return $session;
        }
        return null;
    }

    public function deleteBySessionId(string $session_id): void
    {
        $statement = $this->connection->prepare("DELETE FROM sessions WHERE session_id = ?");
        $statement->execute([$session_id]);
    }

    public function findByUserId(int $user_id): ?Session
    {
        $statement = $this->connection->prepare("SELECT id, session_id, user_id FROM sessions WHERE user_id = ?");
        $statement->execute([$user_id]);
        $session = new Session();
        if($row = $statement->fetch()) {
            $session->session_id = $row['session_id'];
            $session->user_id = $row['user_id'];
            return $session;
        }
        return null;
    }

    public function updateWhereUserId(Session $session): void
    {
        $statement = $this->connection->prepare("UPDATE sessions SET session_id = ? WHERE user_id = ?");
        $statement->execute([
            $session->session_id, $session->user_id
        ]);
    }
}