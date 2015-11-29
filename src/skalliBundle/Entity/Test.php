<?php

namespace skalliBundle\Entity;

/**
 * Test
 */
class Test
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $jilali;

    /**
     * @var string
     */
    private $juuu;

    /**
     * @var \DateTime
     */
    private $hu;


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
     * Set jilali
     *
     * @param string $jilali
     *
     * @return Test
     */
    public function setJilali($jilali)
    {
        $this->jilali = $jilali;

        return $this;
    }

    /**
     * Get jilali
     *
     * @return string
     */
    public function getJilali()
    {
        return $this->jilali;
    }

    /**
     * Set juuu
     *
     * @param string $juuu
     *
     * @return Test
     */
    public function setJuuu($juuu)
    {
        $this->juuu = $juuu;

        return $this;
    }

    /**
     * Get juuu
     *
     * @return string
     */
    public function getJuuu()
    {
        return $this->juuu;
    }

    /**
     * Set hu
     *
     * @param \DateTime $hu
     *
     * @return Test
     */
    public function setHu($hu)
    {
        $this->hu = $hu;

        return $this;
    }

    /**
     * Get hu
     *
     * @return \DateTime
     */
    public function getHu()
    {
        return $this->hu;
    }
}

