<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     */
    private $purchase_price;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     */
    private $sale_price;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Upload your image")
     * @Assert\File(mimeTypes={ "image/png", "image/jpeg" })
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductOrder", mappedBy="product_id")
     */
    private $productOrders;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ShoppingCardItem", inversedBy="product")
     * @ORM\JoinColumn(nullable=false)
     */
    private $shoppingCardItem;

    public function __construct()
    {
        $this->productOrders = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPurchasePrice(): ?float
    {
        return $this->purchase_price;
    }

    public function setPurchasePrice(float $purchase_price): self
    {
        $this->purchase_price = $purchase_price;

        return $this;
    }

    public function getSalePrice(): ?float
    {
        return $this->sale_price;
    }

    public function setSalePrice(float $sale_price): self
    {
        $this->sale_price = $sale_price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCategoryId(): ?Category
    {
        return $this->category_id;
    }

    public function setCategoryId(?Category $category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * @return Collection|ProductOrder[]
     */
    public function getProductOrders(): Collection
    {
        return $this->productOrders;
    }

    public function addProductOrder(ProductOrder $productOrder): self
    {
        if (!$this->productOrders->contains($productOrder)) {
            $this->productOrders[] = $productOrder;
            $productOrder->setProductId($this);
        }

        return $this;
    }

    public function removeProductOrder(ProductOrder $productOrder): self
    {
        if ($this->productOrders->contains($productOrder)) {
            $this->productOrders->removeElement($productOrder);
            // set the owning side to null (unless already changed)
            if ($productOrder->getProductId() === $this) {
                $productOrder->setProductId(null);
            }
        }

        return $this;
    }

    public function getShoppingCardItem(): ?ShoppingCardItem
    {
        return $this->shoppingCardItem;
    }

    public function setShoppingCardItem(?ShoppingCardItem $shoppingCardItem): self
    {
        $this->shoppingCardItem = $shoppingCardItem;

        return $this;
    }

   
  
    

   
}
