<?php

namespace CertAPI\V1\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Certificados
 *
 * @ORM\Table(name="certificados")
 * @ORM\Entity
 */
class Certificados
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="certificado", type="text", length=65535, precision=0, scale=0, nullable=false, unique=false)
     */
    private $certificado;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Certificados
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set certificado
     *
     * @param string $certificado
     *
     * @return Certificados
     */
    public function setCertificado($certificado)
    {
        $this->certificado = $certificado;

        return $this;
    }

    /**
     * Get certificado
     *
     * @return string
     */
    public function getCertificado()
    {
        return $this->certificado;
    }
}

