<?php

class WorkflowsController extends ControllerBase
{

    public function initialize()
    {
        $this->tag->setTitle('Manage your Workflows');
        parent::initialize();
        $this->view->disable();
    }

    public function createAction($id)
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

        $form = new WorkflowForm();
        $workflow = new Workflow();
        $messages = [];

        $data = $this->request->getPost();
        if (!$form->isValid($data, $workflow)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
                $messages[count($messages)] = $message;
            }

            $this->view->messages = $messages;
            return $this->dispatcher->forward(
                [
                    "controller" => "projects",
                    "action"     => "new",
                ]
            );
        }

        $workflow = WorkFlow::findById($id);
        $this->response->setJsonContent('Hello');
        return $this->response;
    }

    /**
     * Send the API call by id.
     * @param int $id
     */
    public function getAction($id)
    {
        $workflow = Workflow::findById($id);
        $this->response->setJsonContent($workflow);
        $this->response->send();
        exit;
    }

    public function saveAction()
    {
        $projectId = $this->request->getPost("project_id", "int");
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                [
                    "controller" => "projects",
                    "action"     => "profile",
                    "params"     => $projectId
                ]
            );
        }
    }
}

