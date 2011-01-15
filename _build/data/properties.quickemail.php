<?php


/**
 * Properties for QuickEmail
 *
 * @package quickemail
 * @subpackage build
 */

$properties = array(
    array(
        'name' => 'allowHtml',
        'desc' => 'prop_quickemail.html_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => '1',
        'lexicon' => 'quickemail:properties',
    ),
    array(
        'name' => 'debug',
        'desc' => 'prop_quickemail.debug_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => '',
        'lexicon' => 'quickemail:properties',
    ),
    array(
        'name' => 'emailSender',
        'desc' => 'prop_quickemail.emailSender_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'quickemail:properties',
    ),
    array(
        'name' => 'errorHeader',
        'desc' => 'prop_quickemail.errorHeader_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '<b>Mailer error info: </b>',
        'lexicon' => 'quickemail:properties',
    ),
    array(
        'name' => 'failureMessage',
        'desc' => 'prop_quickemail.failure_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '<h3 style = "color:red">Send Failed</h3>',
        'lexicon' => 'quickemail:properties',
    ),
    array(
        'name' => 'fromName',
        'desc' => 'prop_quickemail.fromName_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'quickemail:properties',
    ),
    array(
        'name' => 'hideOutput',
        'desc' => 'prop_quickemail.hideOutput_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => '',
        'lexicon' => 'quickemail:properties',
    ),
    array(
        'name' => 'message',
        'desc' => 'prop_quickemail.message_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'quickemail:properties',
    ),
    array(
        'name' => 'msgTpl',
        'desc' => 'prop_quickemail.msgTpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'quickedit:properties',
    ),
    array(
        'name' => 'replyTo',
        'desc' => 'prop_quickemail.replyTo_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'quickemail:properties',
    ),
    array(
        'name' => 'smtpErrorHeader',
        'desc' => 'prop_quickemail.smtpErrorHeader_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '<h3>Server Debug Information:</h3>',
        'lexicon' => 'quickemail:properties',
    ),
    array(
        'name' => 'subject',
        'desc' => 'prop_quickemail.subject_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'quickemail:properties',
    ),
    array(
        'name' => 'successMessage',
        'desc' => 'prop_quickemail.success_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '<h3 style = "color:green">Send reported successful</h3>',
        'lexicon' => 'quickemail:properties',
    ),
    array(
        'name' => 'to',
        'desc' => 'prop_quickemail.to_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'quickemail:properties',
    ),
    array(
        'name' => 'toName',
        'desc' => 'prop_quickemail.toName_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'quickemail:properties',
    ),
    
);

return $properties;