<?php

declare(strict_types=1);

namespace Doctrine\DBAL\Driver\PDO\SQLSrv;

use Doctrine\DBAL\Driver\Middleware\AbstractConnectionMiddleware;
use Doctrine\DBAL\Driver\PDO\Connection as PDOConnection;
use PDO;

final class Connection extends AbstractConnectionMiddleware
{
    private PDOConnection $connection;

    public function __construct(PDOConnection $connection)
    {
        parent::__construct($connection);

        $this->connection = $connection;
    }

    public function prepare(string $sql): Statement
    {
        return new Statement(
            $this->connection->prepare($sql)
        );
    }

    public function getNativeConnection(): PDO
    {
        return $this->connection->getNativeConnection();
    }
}
