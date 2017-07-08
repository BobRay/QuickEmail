<?php
/**
 * QuickEmail
 *
 * Copyright 2011-2017 Bob Ray
 * @file example.php
 * @author Bob Ray <https://bobsguides.com>
 * @date 1/15/11
 *
 * QuickEmail is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * QuickEmail is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * QuickEmail; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package quickemail
 */
/**
 * @description A quick email and diagnostic package for MODX Revolution
 * @package quickemail
 * @subpackage docs
 */

/* This example shows how to send email using QuickEmail from inside another snippet.
 * Simply copy this code into the snippet and set the right-hand values below.
 * Once the mail is working, you'll probably want to set hideOutput to '1'
 * or edit 'successMessage'. If debug is off and the mail is successful, the
 * only value returned will be 'successMessage'. If hideOutput is set to '1'
 * the return value will always be an empty string unless debug is on.
 *
 * You can also modify the value of $output before returning it and you can test
 * it first, to see if it matches the value of 'successMessage'.
 *
 * All of the parameters are optional and have reasonable defaults so try
 * just setting 'message', 'subject', and 'to', and see what you get */

$params = array(
    'debug' => '0',
    'hideOutput' => '0',
    'message' => 'Some Message',
    'subject' => 'Some Subject',
    'to' => 'someone@somewhere.com',
    'fromName' => 'Some Name',
    'emailSender' => 'someone@somewhere.com',
    'replyTo' => 'someone@somewhere.com',
    'html' => '1',
    'failureMessage' => '<br /><h3 style="color:red">Mail Failed</h3>',
    'successMessage' => '<br /><h3 style ="color:green">Mail reported successful</h3>',
    'errorHeader' => '<br />Mail error:',
    'smtpErrorHeader' => '<br />SMTP server report:',
);

$output =  $modx->runSnippet('QuickEmail',$params);
return $output;