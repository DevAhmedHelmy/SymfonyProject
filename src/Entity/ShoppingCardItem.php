<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShoppingCardItemRepository")
 */
class ShoppingCardItem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="shoppingCardItem")
     */
    private $product;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ShoppingCard", inversedBy="shoppingCardItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $shoppingCard;

    public function __construct()
    {
        $this->product = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
            $product->setShoppingCardItem($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->product->contains($product)) {
            $this->product->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getShoppingCardItem() === $this) {
                $product->setShoppingCardItem(null);
            }
        }

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getShoppingCard(): ?ShoppingCard
    {
        return $this->shoppingCard;
    }

    public function setShoppingCard(?ShoppingCard $shoppingCard): self
    {
        $this->shoppingCard = $shoppingCard;

        return $this;
    }
}
