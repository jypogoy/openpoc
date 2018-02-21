<?php

class WorkflowsController extends ControllerBase
{

    public function initialize()
    {
        $this->tag->setTitle('Manage your Workflows');
        parent::initialize();
    }

    public function indexAction()
    {
        $this->view->setTemplateAfter('content');
    }

    public function createAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                [
                    "controller" => "projects"
                ]
            );
        }

        $form = new WorkflowForm();
        $workflow = new Workflow();
        
        $data = $this->request->getPost();
        if (!$form->isValid($data, $workflow)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "projects",
                    "action"     => "profile",
                    "params"     => [$data['project_id']]
                ]
            );
        }

        if ($workflow->save() == false) {
            foreach ($workflow->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "projects",
                    "action"     => "profile",
                    "params"     => [$data['project_id']]
                ]
            );
        }

        $form->clear();        

        $this->flashSession->success("Workflow <b>" . $workflow->name . "</b>  was created successfully.");
        
    }

    /**
     * API call for retrieving a particular record by id.
     * @param int $id
     */
    public function getAction($id)
    {
        $workflow = Workflow::findById($id);
        $this->response->setJsonContent($workflow);
        $this->response->send();
        exit;
    }

    /**
     * API call for updating an existing record on display.
     */
    public function saveAction()
    {
        $data['id'] = $this->request->getPost('id');
        $data['name'] = $this->request->getPost('name');
        $data['description'] = $this->request->getPost('description');
        $data['project_id'] = $this->request->getPost('project_id');
           
        $workflow = Workflow::findFirstById($data['id']);    
        $this->flash->success("Workflow " . $workflow->name . " was updated successfully.");       

        $form = new WorkflowForm($workflow);
        if (!$form->isValid($data, $workflow)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }
            exit;
        }

        if ($workflow->save() == false) {
            foreach ($workflow->getMessages() as $message) {
                $this->flash->error($message);
            }
            exit;
        }
         
        // return $this->dispatcher->forward(
        //     [
        //         "controller" => "projects",
        //         "action"     => "profile",
        //         "params"     => [$data['project_id']]
        //     ]
        // );
    }

    /**     
     * API call that deletes a record by id.
     * @param int $id
     */
    public function deleteAction($id)
    {
        $workflow = Workflow::findFirstById($id);
        if (!$workflow) {
            $this->flashSession->error("Workflow was not found.");
            return $this->response->redirect('projects');
        }

        if (!$workflow->delete()) {
            foreach ($workflow->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "projects",
                    "action"     => "profile",
                    "params"     => [$workflow->project_id]
                ]
            );
        }
        
        $this->flashSession->success("Workflow <b>" . $workflow->name . "</b> was deleted successfully.");

        return $this->response->redirect("projects/profile/" . $workflow->project_id);
    }

    /**
     * API call that retrieves workflow records for a project.
     * @param int $projectId
     */
    public function listByProjectAction($projectId)
    {
        $workflows = Workflow::find();
        $this->view->workflows = $workflows;
        $this->view->setTemplateAfter('content');
    }
}

