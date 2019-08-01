<?php

namespace Models;

/**
 * Class ContactForm
 * @package Models
 */
class ContactForm extends Model
{
    /**
     * @var Int|null
     */
    private $id;

    /**
     * @var String
     */
    private $name;

    /**
     * @var String
     */
    private $phone;

    /**
     * @var String
     */
    private $address;

    /**
     * @var String
     */
    private $message;

    /**
     * ContactForm constructor.
     * @param Int|null $id
     * @param String $name
     * @param String $phone
     * @param String $address
     * @param String $message
     */
    public function __construct(
        Int $id = null,
        String $name = '',
        String $phone = '',
        String $address = '',
        String $message = ''
    )
    {
        $this->table = 'messages';
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable(string $table): void
    {
        $this->table = $table;
    }

    /**
     * @return Int|null
     */
    public function getId(): ?Int
    {
        return $this->id;
    }

    /**
     * @param Int|null $id
     */
    public function setId(?Int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getName(): String
    {
        return $this->name;
    }

    /**
     * @param String $name
     */
    public function setName(String $name): void
    {
        $this->name = $name;
    }

    /**
     * @return String
     */
    public function getPhone(): String
    {
        return $this->phone;
    }

    /**
     * @param String $phone
     */
    public function setPhone(String $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return String
     */
    public function getAddress(): String
    {
        return $this->address;
    }

    /**
     * @param String $address
     */
    public function setAddress(String $address): void
    {
        $this->address = $address;
    }

    /**
     * @return String
     */
    public function getMessage(): String
    {
        return $this->message;
    }

    /**
     * @param String $message
     */
    public function setMessage(String $message): void
    {
        $this->message = $message;
    }

    /**
     * @return array
     */
    public function validateModel()
    {
        $errors = [];

        if(!is_string($this->name) || $this->name == '') {
            $errors['name'] = 'Name should be non-empty string';
        }

        if(!is_string($this->phone) || $this->phone == '') {
            $errors['phone'] = 'Phone should be non-empty string';
        }

        if(!is_string($this->message) || $this->message == '') {
            $errors['message'] = 'Message should be non-empty string';
        }

        return $errors;
    }
}