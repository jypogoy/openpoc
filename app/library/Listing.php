<?php

use Phalcon\Mvc\User\Component;

/**
 * Elements
 *
 * Helps to build record listing UI components.
 */
class Listing extends Component
{

    public function getTable()
    {

    }

    public function getPagination($page, $start, $end, $totalItems, $currentPage)
    {
        
        $controllerName = $this->view->getControllerName();
        
        $content = '<div class="ui equal width grid">
                <div class="column">
                    <div class="common-text">' .
                        ((count($page->items) > 0) ?  "Page " . $page->current . " of " . $page->total_pages . ". Showing Records " . $start . " - " . $end . " of " . $totalItems . "." : 'No projects to show...') .
                    '</div>
                </div>
                <div class="column">
                    <div class="ui right floated pagination menu" style="display: ' . (count($page->items) > 0 ? '' : 'none') . '">
                        <a href="' . $controllerName . '?page=' . $page->first . '" class="icon item ' . ($page->current == 1 ? 'disabled':'') . '">
                            <i class="angle double left icon"></i>
                        </a>
                        <a href="' . $controllerName . '?page=' . $page->before . '" class="icon item ' . ($page->current == 1 ? 'disabled':'') . '">
                            <i class="angle left icon"></i>
                        </a> ';    
                        
                        $pages = self::pagination($currentPage, $page->total_pages);                        
                        
                        for ($p = 0; $p <= count($pages); $p++) {   
                            if (isset($pages[$p]) && strlen($pages[$p]) > 0) {
                                if ($pages[$p] != '...') {
                                    $content = $content . '<a href="' . $controllerName . '?page=' . $pages[$p] . '" class="item ' . ($page->current == $pages[$p] ? 'active paging':'') . '">' . $pages[$p] . '</a>';
                                } else {   
                                    $content = $content . '<div class="item">' . $pages[$p] . '</div>';
                                }
                            }   
                        };
                                                        
            $content = $content . '<a href="' . $controllerName . '?page=' . $page->next . '" class="icon item ' . ($page->current == $page->last ? 'disabled':'') . '">
                            <i class="angle right icon"></i>
                        </a>
                        <a href="' . $controllerName . '?page=' . $page->last . '" class="icon item ' . ($page->current == $page->last ? 'disabled':'') . '">
                            <i class="angle double right icon"></i>
                        </a>
                    </div>                                    
                </div>
            </div>';   
            
            echo $content;
    }

    function pagination($c, $m) 
    {
        $current = $c;
        $last = $m;
        $delta = 1;
        $left = $current - $delta;
        $right = $current + $delta + 1;
        $range = array();
        $rangeWithDots = array();
        $l = -1;

        for ($i = 1; $i <= $last; $i++) 
        {
            if ($i == 1 || $i == $last || $i >= $left && $i < $right) 
            {
                array_push($range, $i);
            }
        }

        for($i = 0; $i<count($range); $i++) 
        {
            if ($l != -1) 
            {
                if ($range[$i] - $l === 2) 
                {
                    array_push($rangeWithDots, $l + 1);
                } 
                else if ($range[$i] - $l !== 1) 
                {
                    array_push($rangeWithDots, '...');
                }
            }
            
            array_push($rangeWithDots, $range[$i]);
            $l = $range[$i];
        }

        return $rangeWithDots;
    }

}