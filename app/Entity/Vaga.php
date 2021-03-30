<?php

namespace App\Entity;

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

      //ATRIBUIR ID DA VAGA NA INSTÂNCIA

      //RETORNAR SUCESSO
    }
}
