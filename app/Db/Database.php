<?php

namespace App\Db;

use PDO;
use PDOException;
use PDOStatement;

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

    //Função para selecionar a tabela e iniciar a conexão
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Função para executar as queries.
     *
     * @param string $query
     * @param array  $params
     *
     * @return PDOStatement
     */
    public function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement;
        } catch (PDOException $e) {
            exit('ERROR: '.$e->getMessage()); //nunca mostrar a mensagem ao usuário em produção
        }
    }

    /**
     * Método responsável por inserir valores no banco.
     *
     * @param array $values [field => value]
     *
     * @return int ID inserido
     */
    public function insert($values)
    {
        //DADOS DA QUERRY
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?'); //cria um array vazio de X posições (count($fields) diz o numero de posições necessárias) e, caso não tenha o tenha o numero de posições, crie posições e preencha com '?'

        //MONTA A QUERRY
        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES('.implode(',', $binds).')';

        //EXECUTA O INSERT
        $this->execute($query, array_values($values));

        //RETORNA O ÚLTIMO ID INSERIDO
        return $this->connection->lastInsertId();
    }

    /**
     * Método responsável por criar uma conexão com o banco de dados.
     */
    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS); //cria uma instância do PDO e faz as conexões com os dados forecidos
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //adiciona exceção caso haja algum erro de sintaxe ou etc na querry
        } catch (PDOException $e) {
            exit('ERROR: '.$e->getMessage()); //nunca mostrar a mensagem ao usuário em produção
        }
    }
}
