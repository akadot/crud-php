<?php

namespace App\Db;

use PDO;
use PDOException;

class Database
{
    /**
     * Nome do host do banco de dados.
     *
     * @var string
     */
    const HOST = 'localhost';

    /**
     * Nome do banco de dados.
     *
     * @var string
     */
    const NAME = 'vagas_db';

    /**
     * Usuário do banco de dados.
     *
     * @var string
     */
    const USER = 'root';

    /**
     * Senha do banco de dados.
     *
     * @var string
     */
    const PASS = 'Hqimom1123581321';

    /**
     * Nome da tabela do banco de dados.
     *
     * @var string
     */
    private $table;

    /**
     * Instância de conexão com o banco de dados.
     *
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela e instancia a conexão.
     *
     * @param string $table
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Método responsável por criar uma conexão com o banco de dados.
     */
    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            exit('ERROR: '.$e->getMessage()); //nunca mostrar a mensagem ao usuário em produção
        }
    }
}
