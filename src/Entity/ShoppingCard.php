<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShoppingCardRepository")
 */
class ShoppingCard
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
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="shoppingCard", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ShoppingCardItem", mappedBy="shoppingCard")
     */
    private $shoppingCardItems;

    public function __construct()
    {
        $this->shoppingCardItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|ShoppingCardItem[]
     */
    public function getShoppingCardItems(): Collection
    {
        return $this->shoppingCardItems;
    }

    public function addShoppingCardItem(ShoppingCardItem $shoppingCardItem): self
    {
        if (!$this->shoppingCardItems->contains($shoppingCardItem)) {
            $this->shoppingCardItems[] = $shoppingCardItem;
            $shoppingCardItem->setShoppingCard($this);
        }

        return $this;
    }

    public function removeShoppingCardItem(ShoppingCardItem $shoppingCardItem): self
    {
        if ($this->shoppingCardItems->contains($shoppingCardItem)) {
            $this->shoppingCardItems->removeElement($shoppingCardItem);
            // set the owning side to null (unless already changed)
            if ($shoppingCardItem->getShoppingCard() === $this) {
                $shoppingCardItem->setShoppingCard(null);
            }
        }

        return $this;
    }
}
