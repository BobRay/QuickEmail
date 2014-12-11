<?php
/**
 * QuickEmail
 *
 * Copyright 2011-2013 Bob Ray
 *
 * @author Bob Ray
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
 * @package quickEmail
 */
/**
 * MODX QuickEmail Snippet
 * @description A quick email sending and diagnostic snippet for MODX Revolution
 * @package quickemail
 * @version 1.0.4

 * @var $modx modX
 * @var $scriptProperties array
 *
 * @property string message - Message for the email body; default: `Default Message`.
 * @property string subject - Subject for the email message; default: `Default Subject`.
 * @property string to - Address the email message will be sent to; default: emailsender System Setting.
 * @property string toName - Value for message toName; default; emailsender System Setting.
 * @property string fromName - Value for message fromName; default; site_name System Setting.
 * @property string emailSender - Email address for from field of email; default: emailsender System Setting.
 * @property string replyTo - Value for replyTo field for email; default: emailsender System Setting.
 * @property boolean debug - Turn on debugging (still attempts to send email); default: `0`
 * @property boolean html - Allow HTML in message; default: `1`
 * @property string msgTpl - If sent, the specified chunk will be used for the message body and the &message parameter will be ignored.
 * @property boolean hideOutput - Stifle all output from the snippet; ignored if debug is set; default: `0`
 * @property string success - Message to display when send is successful
 * @property string failure - Message to display when send is successful
 * @property string errorHeader - Header for mail error message
 * @property string smtpErrorHeader - Header for smtp server error messages section
 */

/* Bail if the user is not logged in to the Manager -- prevents bots
   from triggering emails */

if (! $modx->user->hasSessionContext('mgr')) return 'Unauthorized';
/* save some typing */
$sp = $scriptProperties;

/* get the MODX mailer object */
$modx->getService('mail', 'mail.modPHPMailer');

/* set default values */
$output = '';
$debug = $modx->getOption('debug',$sp,false);
if (is_string($debug) && strlen($debug) > 1) {
    $debug = stristr('no',$debug)? false : true;
}
$tpl = $modx->getOption('msgTpl',$scriptProperties,false);
$message = $modx->getOption('message',$sp,false);
$message = empty($message)? 'Default Message' : $message;
$subject = $modx->getOption('subject',$sp);
$subject = empty($subject)? 'Default Subject' : $subject;
$to = $modx->getOption('to',$sp);
$to = empty($to)? $modx->getOption('emailsender') : $to;
$toName = $modx->getOption('toName',$sp);
$toName = empty($toName)? $modx->getOption('emailsender') : $to;
$fromName = $modx->getOption('fromName',$sp);
$fromName = empty($fromName)? 'QuickEmail' : $fromName;
$emailSender = $modx->getOption('emailSender',$sp);
$emailSender = empty($emailSender) ? $modx->getOption('emailsender',null,false): $emailSender;
$replyTo = $modx->getOption('replyTo',$sp);
$replyTo = empty($replyTo)? $modx->getOption('emailsender'): $replyTo;
$html = $modx->getOption('allowHtml',$sp,false);
if (is_string($html) && strlen($html) > 1) {
    $html = stristr('no',$html)? false : true;
}
$hideOutput = $modx->getOption('hideOutput',$sp,false);
if (is_string($hideOutput) && strlen($hideOutput) > 1) {
    $hideOutput = stristr('yes',$hideOutput)? true : false;
}
$failureMessage = $modx->getOption('failureMessage',$sp,false);
$successMessage = $modx->getOption('successMessage',$sp,false);
$errorHeader = $modx->getOption('errorHeader',$sp,false);

if (! empty ($tpl) ) {
    $msg = $modx->getChunk($tpl);
    if (empty($msg) && $debug) {
        $output .= '<br />Error: Cannot find Tpl chunk: ' . $tpl;
    }
} else {
    $msg = $message;
}

if (! $msg) {
   $msg = 'Default Message';
}

if ($debug) {
    $output .= '<h3>System Settings (used if property is missing):</h3>';
    $output .= '<b>emailsender System Setting:</b> ' .$modx->getOption('emailsender',$sp);
    $output .= '<br /><b>site_name System Setting:</b> ' .$modx->getOption('site_name',$sp);

    $output .= '<h3>Properties (from parameters, property set, or snippet default properties:</h3>';
    $output .= '<b>Tpl chunk name:</b> ' . $modx->getOption('msgTpl',$sp);
    $output .= '<br /><b>subject:</b> ' . $modx->getOption('subject',$sp);
    $output .= '<br /><b>to:</b> ' . $modx->getOption('to',$sp,'empty');
    $output .= '<br /><b>fromName:</b> ' . $modx->getOption('fromName',$sp);
    $output .= '<br /><b>replyTo:</b> ' . $modx->getOption('replyTo',$sp);
    $output .= '<br /><b>emailSender:</b> ' . $modx->getOption('emailSender',$sp);
    $output .= '<br /><b>allowHtml:</b> ' . $modx->getOption('allowHtml',$sp);
    $output .= '<br /><b>message:</b> ' . $modx->getOption('message',$sp);


    $output .= '<h3>Final Values (actually used when sending email):</h3>';
    $output .= '<b>subject:</b> ' .$subject;
    $output .= '<br /><b>to:</b> ' .$to;
    $output .= '<br /><b>fromName:</b> ' .$fromName;
    $output .= '<br /><b>replyTo:</b> ' .$replyTo;
    $output .= '<br /><b>emailSender:</b> ' .$emailSender;
    $output .= '<br /><b>allowHtml:</b> ' . $html;
    $output .= '<br /><b>Message Body:</b> ' . $msg;

}

$modx->mail->set(modMail::MAIL_BODY, $msg);
$modx->mail->set(modMail::MAIL_FROM, $emailSender);
$modx->mail->set(modMail::MAIL_FROM_NAME, $fromName);
$modx->mail->set(modMail::MAIL_SENDER, $emailSender);
$modx->mail->set(modMail::MAIL_SUBJECT, $subject);
$modx->mail->address('to', $to, $toName);
$modx->mail->address('reply-to', $replyTo);
$modx->mail->setHTML($html);
if ($debug) {
    ob_start();
    echo '<pre>';

    if ($modx->getOption('mail_use_smtp') ) {
        $modx->mail->mailer->SMTPDebug = 2;
    }
}
$sent = $modx->mail->send();

if ($debug) {
    echo '</pre>';
    $ob = ob_get_contents();
    ob_end_clean();
}

$modx->mail->reset();

if ($sent) {
    $output .= $successMessage;
    if ($debug) {
       $output .= $ob;
    }
} else  {

    $output .= $failureMessage;
    $output .= $errorHeader;
    $output .= $modx->mail->mailer->ErrorInfo;
    if (!empty($ob)) {
        $output .= $smtpErrorHeader;
    }
    $output .= $ob;


}
$output = $hideOutput && (! $debug )? '' : $output . "<br /><br />";
return $output;