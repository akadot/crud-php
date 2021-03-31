<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

//Instância de vagas
class Vaga
{
    /**
     * Identificado único da Vaga.
     *
     * @var int
     */
    public $id;

    /**
     * Título da Vaga.
     *
     * @var string
     */
    public $title;

    /**
     * Descrição da Vaga.
     *
     * @var string
     */
    public $description;

    /**
     * Define se a vaga está ativa.
     *
     * @var string(s/n)
     */
    public $active;

    /**
     * Data de criação da Vaga.
     *
     * @var string
     */
    public $date;

    /**
     * Método responsável por cadastrar uma nova vaga no banco.
     *
     * @return bool
     */
    public function register()
    {
        //DEFINIR A DATA
        $this->date = date('Y-m-d H:i:s');

        //CADASTRAR VAGA NO BANCO
        $obDatabase = new Database('vagas');
        $this->id = $obDatabase->insert([
            'title' => $this->title,
            'description' => $this->description,
            'active' => $this->active,
            'date' => $this->date,
        ]);

        //RETORNAR SUCESSO
        return true;
    }

    /**
     * Método para deletar uma vaga no banco
     * @return boolean
     */
    public function delete()
    {
        return (new Database('vagas'))->delete('id = '. $this->id);
    }

    /**
     * Método responsável por atualizar a vaga no banco
     *
     * @return boolean
     */
    public function update()
    {
        return (new Database('vagas'))->update('id = '.$this->id, [
        'title' => $this->title,
        'description' => $this->description,
        'active' => $this->active,
        'date' => $this->date,]);
    }

    /**
     * Método responsável por obert as vagas no banco de dados.
     *
     * @param null|string $where
     * @param null|string $order
     * @param null|string $limit
     *
     * @return array
     */
    public static function getVagas($where = null, $order = null, $limit = null)
    {
        return (new Database('vagas'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class)
        ;
    }

    /**
     * Método responsável por buscar uma vaga.
     *
     * @param int $id
     */
    public static function getVaga($id)
    {
        return (new Database('vagas'))->select('id = '.$id)->fetchObject(self::class);
    }
}
