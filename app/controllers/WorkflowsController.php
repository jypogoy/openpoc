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
        $form = new WorkflowForm();
        $workflow = new Workflow();        

        $data = $this->request->getPost();
        if (!$form->isValid($data, $workflow)) {
            foreach ($form->getMessages() as $message) {
                $this->flashSession->error($message);
            }
            return $this->response->redirect('projects/profile/' . $data['project_id']);
        }

        if ($workflow->save() == false) {
            foreach ($workflow->getMessages() as $message) {
                $this->flashSession->error($message);
            }
            return $this->response->redirect('projects/profile/' . $data['project_id']);
        }
         
        $this->flashSession->success("Workflow was created successfully.");       

        return $this->response->redirect('projects/profile/' . $data['project_id']);
    }

    // public function createAction()
    // {
    //     $form = new WorkflowForm();
    //     $workflow = new Workflow();
        
    //     $data = $this->request->getPost();
    //     if (!$form->isValid($data, $workflow)) {
    //         foreach ($form->getMessages() as $message) {
    //             $this->flash->error($message);
    //         }

    //         return $this->dispatcher->forward(
    //             [
    //                 "controller" => "projects",
    //                 "action"     => "profile",
    //                 "params"     => [$data['project_id']]
    //             ]
    //         );
    //     }

    //     if ($workflow->save() == false) {
    //         foreach ($workflow->getMessages() as $message) {
    //             $this->flash->error($message);
    //         }

    //         return $this->dispatcher->forward(
    //             [
    //                 "controller" => "projects",
    //                 "action"     => "profile",
    //                 "params"     => [$data['project_id']]
    //             ]
    //         );
    //     }

    //     $form->clear();        

    //     $this->flashSession->success("Workflow <b>" . $workflow->name . "</b>  was created successfully.");
       
    //     return $this->dispatcher->forward(
    //         [
    //             "controller" => "projects",
    //             "action"     => "profile",
    //             "params"     => [$data['project_id']]
    //         ]
    //     );
    // }

    public function ajaxCreateAction()
    {
        $data = $this->request->getPost();        

        $workflow = new Workflow();
        $form = new WorkflowForm($workflow);
        if (!$form->isValid($data, $workflow)) {
            foreach ($form->getMessages() as $message) {
                $this->flashSession->error($message);
            }
            exit;
        }

        if ($workflow->save() == false) {
            foreach ($workflow->getMessages() as $message) {
                $this->flashSession->error($message);
            }
            exit;
        }
                
        return "Workflow " . $data['name'] . " was created successfully.";  
    }    

    /**
     * API call for retrieving a particular record by id.
     * @param int $id
     */
    public function getAction($id)
    {
        $workflow = Workflow::findById($id);
        if (!$workflow) {
            $this->flash->error("Workflow was not found.");
            return $this->dispatcher->forward(
                [
                    "controller" => "projects",
                    "action"     => "profile",
                    "params"     => [$data['project_id']]
                ]
            );
        }

        $this->response->setJsonContent($workflow);
        $this->response->send();
        exit;
    }

    public function ajaxSaveAction()
    {
        $data = $this->request->getPost();
        $workflow = Workflow::findFirstById($data['id']); 
        $successMsg = "Workflow " . $workflow->name . " was updated successfully.";  

        $form = new WorkflowForm($workflow);
        if (!$form->isValid($data, $workflow)) {
            foreach ($form->getMessages() as $message) {
                $this->flashSession->error($message);
            }
            exit;
        }

        if ($workflow->save() == false) {
            foreach ($workflow->getMessages() as $message) {
                $this->flashSession->error($message);
            }
            exit;
        }
                
        return $successMsg;
    }

    public function saveAction()
    {
        $data = $this->request->getPost();
        $workflow = Workflow::findFirstById($data['id']); 

        $form = new WorkflowForm($workflow);
        if (!$form->isValid($data, $workflow)) {
            foreach ($form->getMessages() as $message) {
                $this->flashSession->error($message);
            }
            return false;
        }

        if ($workflow->save() == false) {
            foreach ($workflow->getMessages() as $message) {
                $this->flashSession->error($message);
            }
            return false;
        }
         
        $this->flashSession->success("Workflow " . $workflow->name . " was updated successfully.");    

        return $this->response->redirect('projects/profile/' . $data['project_id']);
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

    public function ajaxDeleteAction($id)
    {
        $workflow = Workflow::findFirstById($id); 
        if (!$workflow) {
            $this->flashSession->error("Workflow was not found.");
            return $this->response->redirect('projects');
        }

        $successMsg = "Workflow " . $workflow->name . " was deleted successfully.";  

        if (!$workflow->delete()) {
            foreach ($workflow->getMessages() as $message) {
                $this->flashSession->error($message);
            }
            exit;
        }
                
        return $successMsg;
    }

    /**
     * API call that retrieves workflow records for a project.
     * @param int $projectId
     */
    public function listByProjectAction($projectId)
    {
        $this->view->disable();

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["conditions"] = "project_id = " . $projectId;
        
        $workflows = Workflow::find($parameters);
        // $this->view->workflows = $workflows;
        // $this->view->setTemplateAfter('content');
        $this->response->setJsonContent($workflows);
        $this->response->send();        
    }
}

