<?php

require "StudipMobileController.php";
require dirname(__FILE__) . "/../models/mail.php";

use Studip\Mobile\Mail;


class MailsController extends StudipMobileController
{
        /**
         * custom before filter (see StudipMobileController#before_filter)
         */
        function before()
        {
                # require a logged in User or else redirect to session/new
                $this->requireUser();
        }
        
        function index_action()
        {
                    $this->inbox = Mail::findAllByUser($this->currentUser()->id,true);
        }
        function list_inbox_action()
        {
                    $this->inbox = Mail::findAllByUser($this->currentUser()->id,true);
        }
        function list_outbox_action()
        {
                    $this->outbox = Mail::findAllByUser($this->currentUser()->id, false);
        }
        function show_msg_action($id = null)
        {
                    $this->mail = Mail::findMsgById($this->currentUser()->id, $id);
        }
}

