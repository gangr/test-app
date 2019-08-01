<?php

namespace Controllers;

use Core\Request;
use Repositories\ContactFormRepsitory;
use Models\ContactForm;

/**
 * Class MainController
 * @package Controllers
 */
class AdminController extends BaseController
{
    /**
     * @var Request
     */
    public $request;

    /**
     * MainController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function indexAction()
    {
        // Get all records
        $repository = new ContactFormRepsitory(new ContactForm());
        $data = $repository->getAll();

        $data = $data ? $data : 'No records found.';

        // Set variables
        $params = [
            'data' => $data
        ];
        if(isset($this->request->assets['styles'])) $params['styles'] = $this->request->assets['styles'];
        if(isset($this->request->assets['scripts'])) $params['scripts'] = $this->request->assets['scripts'];
        $this->render('admin_view', $params);
    }

    /**
     * @param Int $id
     */
    public function deleteAction(Int $id)
    {
        $repository = new ContactFormRepsitory(new ContactForm());
        if($repository->deleteOneById($id)) {
            $result = [
                'success' => 1,
                'message' => "Record $id deleted."
            ];
        } else {
            $result = [
                'success' => 0,
                'message' => "Error deleting record $id."
            ];
        }

        $this->jsonResponse($result);
        exit;
    }
}