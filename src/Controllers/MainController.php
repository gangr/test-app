<?php

namespace Controllers;

use Core\Request;
use Repositories\ContactFormRepsitory;
use Models\ContactForm;

/**
 * Class MainController
 * @package Controllers
 */
class MainController extends BaseController
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
        if($this->request->isAjaxRequest && !empty($this->request->postParams)) {

            $params = $this->request->postParams;
            $record = [
                'name' => $params['name'],
                'phone' => $params['phone'],
                'address' => $params['address'],
                'message' => $params['message'],
            ];

            $repository = new ContactFormRepsitory(new ContactForm());

            if($repository->addRecord($record)) {
                $result = [
                    'success' => 1,
                    'message' => 'New record successfully added.'
                ];
            } else {
                $result = [
                    'success' => 0,
                    'message' => 'Error adding new record.'
                ];
            }

            $this->jsonResponse($result);
            exit;
        }

        // Set variables
        $params = [];
        if(isset($this->request->assets['styles'])) $params['styles'] = $this->request->assets['styles'];
        if(isset($this->request->assets['scripts'])) $params['scripts'] = $this->request->assets['scripts'];
        $this->render('main_view', $params);
    }
}