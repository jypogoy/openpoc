<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class ProjectsController extends ControllerBase
{

    const ITEMS_PER_PAGE = 15;    
    const DEFAULT_SORT_FIELD = 'name';
    const DEFAULT_SORT_DIRECTION = 'ASC';

    public function initialize()
    {
        $this->tag->setTitle('Manage your Projects');
        parent::initialize();
    }

    public function indexAction()
    {
        $this->persistent->parameters = null;
        $itemsPerPage = self::ITEMS_PER_PAGE;
        $currentPage = 1;
        $keyword = null;
        $sortField = null;
        $sortDirection = null;

        $projects = array();
        
        if ($this->request->isPost()) {
            $keyword = $this->request->getPost("keyword");
            $sortField = trim($this->request->getPost("sortField")) != '' ? $this->request->getPost("sortField") : $sortField;
            $sortDirection = trim($this->request->getPost("sortDirection")) != '' ? $this->request->getPost("sortDirection") : $sortDirection;

            if (strlen($keyword) > 0) {
                $this->session->set('page', 1);      
                if ($this->session->get('keyword') != $keyword) {
                    $this->session->set('keyword', $keyword);
                }                        
            } else {                
                $this->session->set('keyword', null);
            }   
            if (strlen($sortField) > 0) {
                if ($this->session->get('sortField') != $sortField) {
                    $this->session->set('sortField', $sortField);
                }
            } else {
                $sortField = self::DEFAULT_SORT_FIELD;
                $this->session->set('sortField', $sortField);
            }    
            if (strlen($sortDirection) > 0) {
                if ($this->session->get('sortDirection') != $sortDirection) {
                    $this->session->set('sortDirection', $sortDirection);
                }  
            } else {
                $sortDirection = self::DEFAULT_SORT_DIRECTION;
                $this->session->set('sortDirection', $sortDirection);
            }    

        } else {
            if (strlen($keyword) > 0) {
                $this->session->set('keyword', $keyword);                
            } else {
                if ($this->session->get('keyword') != null) {
                    $keyword = $this->session->get('keyword');
                }
            }
            if (strlen($sortField) > 0) {
                $this->session->set('sortField', $sortField);
            } else {
                if ($this->session->get('sortField') != null) {
                    $sortField = $this->session->get('sortField');
                } else {
                    $sortField = self::DEFAULT_SORT_FIELD;
                    $this->session->set('sortField', $sortField);
                }
            }
            if (strlen($sortDirection) > 0) {
                $this->session->set('sortDirection', $sortDirection);
            } else {
                if ($this->session->get('sortDirection') != null) {
                    $sortDirection = $this->session->get('sortDirection');
                } else {
                    $sortDirection = self::DEFAULT_SORT_DIRECTION;
                    $this->session->set('sortDirection', $sortDirection);
                }
            }
        }
        
        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["conditions"] = "name LIKE '%" . $keyword . "%' OR description LIKE '%" . $keyword . "%'";
        $parameters["order"] = $sortField . ' ' . $sortDirection;        

        if ($this->session->get('page') !== null) {
            if ($this->request->getQuery('page', 'int') !== null) {
                $currentPage = $this->request->getQuery('page', 'int');
                $this->session->set('page', $currentPage);
            } else {
                $currentPage = $this->session->get('page');
            }
        } else {
            $currentPage = $this->request->getQuery('page', 'int');
            $this->session->set('page', $currentPage);
        }
        
        try {
            // The data set to paginate
            $projects = Project::find($parameters);
            
        } catch (\Exception $e) {
            $this->flash->error($e->getMessage());
        }
        
        // Create a Model paginator, show number of rows by page starting from $currentPage
        $paginator = new Paginator([
            'data' => $projects,
            'limit'=> $itemsPerPage,
            'page' => $currentPage
        ]);

        // Get the paginated results
        $page = $paginator->getPaginate();

        $totalItems = count($projects);
        $start = ($page->current - 1) * $itemsPerPage + 1;
        $end = $totalItems;

        if ($itemsPerPage < $page->items) {
            $end = $itemsPerPage * $page->current;
            if ($end > $totalItems) {
                $end = $totalItems;
            }
        }

        $this->view->keyword = $keyword;
        $this->view->sortField = $sortField;
        $this->view->sortDirection = $sortDirection;
        $this->view->page = $page;
        $this->view->start = $start;
        $this->view->end = $end;
        $this->view->totalItems = $totalItems;
        $this->view->currentPage = $currentPage;
    }
    
}

