<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Product", mappedBy="order_id")
     */
    private $products_order;

    public function __construct()
    {
        $this->products_order = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getClientId(): ?Client
    {
        return $this->client_id;
    }

    public function setClientId(?Client $client_id): self
    {
        $this->client_id = $client_id;

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

    /**
     * @return Collection|Product[]
     */
    public function getProductsOrder(): Collection
    {
        return $this->products_order;
    }

    public function addProductsOrder(Product $productsOrder): self
    {
        if (!$this->products_order->contains($productsOrder)) {
            $this->products_order[] = $productsOrder;
            $productsOrder->addOrderId($this);
        }

        return $this;
    }

    public function removeProductsOrder(Product $productsOrder): self
    {
        if ($this->products_order->contains($productsOrder)) {
            $this->products_order->removeElement($productsOrder);
            $productsOrder->removeOrderId($this);
        }

        return $this;
    }
}
