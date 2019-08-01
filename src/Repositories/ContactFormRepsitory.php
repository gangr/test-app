<?php

namespace Repositories;

use Interfaces\RepositoryInterface;
use Models\ContactForm;

class ContactFormRepsitory extends Repository implements RepositoryInterface
{
    /**
     * @var string
     */
    public $table;

    /**
     * @var ContactForm
     */
    public $model;

    /**
     * ContactFormRepsitory constructor.
     * @param ContactForm $contactForm
     */
    public function __construct(ContactForm $contactForm)
    {
        parent::__construct();
        $this->table = $contactForm->getTable();
        $this->model = $contactForm;

        $sql = 'CREATE TABLE IF NOT EXISTS '. $this->table .' (
                id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100),
                phone VARCHAR(20),
                address VARCHAR(255),
                message VARCHAR(255)
            );';
        $this->db->runSql($sql);
    }

    /**
     * @return array|mixed|null
     */
    public function getAll()
    {
        $sql = 'SELECT * from ' . $this->table;
        $result = $this->db->runSql($sql);

        $data = [];
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            $data = null;
        }

        return $data;
    }

    /**
     * @param array $record
     * @return array|bool|mixed|\mysqli_result
     */
    public function addRecord(Array $record)
    {
        // create new model and set values
        $this->model->setName(isset($record['name']) ? $record['name'] : '');
        $this->model->setPhone(isset($record['phone']) ? $record['phone'] : '');
        $this->model->setAddress(isset($record['address']) ? $record['address'] : '');
        $this->model->setMessage(isset($record['message']) ? $record['message'] : '');

        // validate model
        $errors = $this->model->validateModel();

        // return errors if validation failed
        if(!empty($errors)) {
            return [
                'errors' => $errors
            ];
        }

        $name = "'" . $this->model->getName() . "'";
        $phone = "'" . $this->model->getPhone() . "'";
        $address = "'" . $this->model->getAddress() . "'";
        $message = "'" . $this->model->getMessage() . "'";

        // insert new record
        $sql = "INSERT INTO " . $this->table . " (name, phone, address, message)
                VALUES ($name, $phone, $address, $message)";

        return $this->db->runSql($sql);
    }

    public function deleteOneById(Int $id)
    {
        $id = intval($id);

        // delete record
        $sql = "DELETE FROM " . $this->table . " WHERE id=$id";

        return $this->db->runSql($sql);
    }

}