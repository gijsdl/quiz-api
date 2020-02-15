<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UitslagRepository")
 */
class Uitslag implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\Column(type="json")
     */
    private $question1 = [];

    /**
     * @ORM\Column(type="json")
     */
    private $question2 = [];

    /**
     * @ORM\Column(type="json")
     */
    private $question3 = [];

    /**
     * @ORM\Column(type="json")
     */
    private $question4 = [];

    /**
     * @ORM\Column(type="json")
     */
    private $question6 = [];

    /**
     * @ORM\Column(type="json")
     */
    private $question5 = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getQuestion1(): ?array
    {
        return $this->question1;
    }

    public function setQuestion1(array $question1): self
    {
        $this->question1 = $question1;

        return $this;
    }

    public function getQuestion2(): ?array
    {
        return $this->question2;
    }

    public function setQuestion2(array $question2): self
    {
        $this->question2 = $question2;

        return $this;
    }

    public function getQuestion3(): ?array
    {
        return $this->question3;
    }

    public function setQuestion3(array $question3): self
    {
        $this->question3 = $question3;

        return $this;
    }

    public function getQuestion4(): ?array
    {
        return $this->question4;
    }

    public function setQuestion4(array $question4): self
    {
        $this->question4 = $question4;

        return $this;
    }

    public function getQuestion6(): ?array
    {
        return $this->question6;
    }

    public function setQuestion6(array $question6): self
    {
        $this->question6 = $question6;

        return $this;
    }

    public function getQuestion5(): ?array
    {
        return $this->question5;
    }

    public function setQuestion5(array $question5): self
    {
        $this->question5 = $question5;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return[
          'name'=>$this->naam,
            'question1'=>$this->question1,
            'question2'=>$this->question2,
            'question3'=>$this->question3,
            'question4'=>$this->question4,
            'question5'=>$this->question5,
            'question6'=>$this->question6,
        ];
    }
}
