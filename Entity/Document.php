<?php


class Document
{
    private ?int $id;
    private ?string $title;
    private ?string $link;
    private ?Category $category;
    private ?Item $item;
    private ?int $default_visibility;

    /**
     * Document constructor.
     * @param int|null $id
     * @param string|null $title
     * @param string|null $link
     * @param Category|null $category
     * @param Item|null $item
     * @param int|null $default_visibility
     */
    public function __construct(int $id = null, string $title = null, string $link = null, Category $category = null, Item $item = null, int $default_visibility = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->link = $link;
        $this->category = $category;
        $this->item = $item;
        $this->default_visibility = $default_visibility;
    }

    /**
     * Return id
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Return the title of Document
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set title
     * @param string|null $title
     */
    public function setTitle(?string $title): Document
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Return the link of Document
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * Set link
     * @param string|null $link
     */
    public function setLink(?string $link): Document
    {
        $this->link = $link;
        return $this;
    }

    /**
     * Return the category name of Document
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category->getName();
    }

    /**
     * Return the category id of Document
     * @return string|null
     */
    public function getCategoryId(): ?string
    {
        return $this->category->getId();
    }

    /**
     * Set category
     * @param Category|null $category
     * @return Document
     */
    public function setCategory(?Category $category): Document
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Return the type of Document
     * @return string|null
     */
    public function getItem(): ?string
    {
        return $this->item->getName();
    }

    /**
     * Set type
     * @param Item|null $item
     * @return Document
     */
    public function setItem(?Item $item): Document
    {
        $this->item = $item;
        return $this;
    }

    /**
     * Return visibility
     * @return int|null
     */
    public function getDefault_visibility(): ?int
    {
        return $this->default_visibility;
    }

    /**
     * Set the visibility of Document
     * @param int|null $default_visibility
     * @return Document
     */
    public function setDefault_visibility(?int $default_visibility): Document
    {
        $this->default_visibility = $default_visibility;
        return $this;
    }
}