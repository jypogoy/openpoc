<?php

use Phalcon\Mvc\User\Component;

/**
 * Elements
 *
 * Helps to build alert and message UI elements for the application.
 */
class Alert extends Component
{  
    public function getForwardMessage()
    {
        // Not implemented
    }

    public function getRedirectMessage() 
    {
        $messages = $this->flashSession->getMessages();
        if (!is_null($messages)) {
            foreach ($messages as $type => $message) {
                
                switch ($type) {
                case 'success':
                    
                    echo '<div class="ui success floating message">
                            <i class="close icon"></i>
                            <div class="header">
                            Success!
                            </div>
                            <p>' . $message[0] . '</p>
                        </div>';

                    break;
                
                case 'error':
                    
                    echo '<div class="ui error floating message">
                            <i class="close icon"></i>
                            <div class="header">
                            Error!
                            </div>
                            <p>' . $message[0] . '</p>
                        </div>';      

                    break;

                case 'warning':
                    
                    echo '<div class="ui warning floating message">
                            <i class="close icon"></i>
                            <div class="header">
                            Warning!
                            </div>
                            <p>' . $message[0] . '</p>
                        </div>'; 
                    
                    break;  

                default: # Notice
                        
                    echo '<div class="ui info floating message">
                            <i class="close icon"></i>
                            <div class="header">
                            Info
                            </div>
                            <p>' . $message[0] . '</p>
                        </div>'; 

                    break;
                }
                
                break;
            }  
        }

    }

}