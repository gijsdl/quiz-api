<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VraagRepository")
 */
class Vraag
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
    private $question;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $option1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $option2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $option3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $option4;

    /**
     * @ORM\Column(type="integer")
     */
    private $answer;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $selected;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getOption1(): ?string
    {
        return $this->option1;
    }

    public function setOption1(string $option1): self
    {
        $this->option1 = $option1;

        return $this;
    }

    public function getOption2(): ?string
    {
        return $this->option2;
    }

    public function setOption2(string $option2): self
    {
        $this->option2 = $option2;

        return $this;
    }

    public function getOption3(): ?string
    {
        return $this->option3;
    }

    public function setOption3(string $option3): self
    {
        $this->option3 = $option3;

        return $this;
    }

    public function getOption4(): ?string
    {
        return $this->option4;
    }

    public function setOption4(string $option4): self
    {
        $this->option4 = $option4;

        return $this;
    }

    public function getAnswer(): ?int
    {
        return $this->answer;
    }

    public function setAnswer(int $answer): self
    {
        $this->answer = $answer;

        return $this;
    }

    public function getSelected(): ?int
    {
        return $this->selected;
    }

    public function setSelected(?int $selected): self
    {
        $this->selected = $selected;

        return $this;
    }
}
