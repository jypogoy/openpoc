<?php

use Phalcon\Mvc\User\Component;

/**
 * Elements
 *
 * Helps to build UI elements for the application
 */
class Elements extends Component
{
    private $_headerMenu = [
        'left' => [
            'index' => [
                'caption' => 'Home',
                'action' => 'index'
            ],      
            'projects' => [
                'caption' => 'Projects',
                'action' => 'index'
            ],          
            'about' => [
                'caption' => 'About',
                'action' => 'index'
            ],
            'contact' => [
                'caption' => 'Contact',
                'action' => 'index'
            ]
        ],
        'right' => [
            'session' => [
                'caption' => 'Log In/Sign Up',
                'action' => 'index'
            ]
        ]
    ];

    private $_tabs = [
        'Invoices' => [
            'controller' => 'invoices',
            'action' => 'index',
            'any' => false
        ],
        'Companies' => [
            'controller' => 'companies',
            'action' => 'index',
            'any' => true
        ],
        'Products' => [
            'controller' => 'products',
            'action' => 'index',
            'any' => true
        ],
        'Product Types' => [
            'controller' => 'producttypes',
            'action' => 'index',
            'any' => true
        ],
        'Your Profile' => [
            'controller' => 'invoices',
            'action' => 'profile',
            'any' => false
        ]
    ];

    /**
     * Builds header menu with left and right items
     *
     * @return string
     */
    public function getMenu()
    {

        $auth = $this->session->get('auth');
        if ($auth) {
            $this->_headerMenu['right']['session'] = [
                'caption' => 'Log Out',
                'action' => 'end'
            ];
        } else {
            unset($this->_headerMenu['left']['projects']);
        }

        $controllerName = $this->view->getControllerName();
        foreach ($this->_headerMenu as $position => $menu) {
            if ($position == 'right') {
                echo '<div class="right menu">';
            }    
            foreach ($menu as $controller => $option) {
                if ($controllerName == $controller) {
                    echo $this->tag->linkTo([$controller != 'index' ? $controller . '/' . ($controller == 'session' ? $option['action'] : '') : '', $option['caption'], 'class' => 'active item']);
                } else {
                    echo $this->tag->linkTo([$controller != 'index' ? $controller . '/' . ($controller == 'session' ? $option['action'] : '') : '', $option['caption'], 'class' => 'item']);
                }
            }
            if ($position == 'right') {
                echo '</div">';
            }    
        }
        // foreach ($this->_headerMenu as $position => $menu) {
        //     echo '<div class="nav-collapse">';
        //     echo '<ul class="nav navbar-nav ', $position, '">';
        //     foreach ($menu as $controller => $option) {
        //         if ($controllerName == $controller) {
        //             echo '<li class="active">';
        //         } else {
        //             echo '<li>';
        //         }
        //         echo $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']);
        //         echo '</li>';
        //     }
        //     echo '</ul>';
        //     echo '</div>';
        // }

    }

    /**
     * Returns menu tabs
     */
    public function getTabs()
    {
        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();
        echo '<ul class="nav nav-tabs">';
        foreach ($this->_tabs as $caption => $option) {
            if ($option['controller'] == $controllerName && ($option['action'] == $actionName || $option['any'])) {
                echo '<li class="active">';
            } else {
                echo '<li>';
            }
            echo $this->tag->linkTo($option['controller'] . '/' . $option['action'], $caption), '</li>';
        }
        echo '</ul>';
    }
    
}
