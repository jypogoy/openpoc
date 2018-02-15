<?php

class WorkflowController extends ControllerBase
{

    public function indexAction()
    {
        
    }

    public function create($id)
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                [
                    "controller" => "projects",
                    "action"     => "profile",
                    "params"     => $id
                ]
            );
        }


        $workflow = WorkFlow::findById($id);
        $this->response->setJsonContent('Hello');
        return $this->response;
    }

}

