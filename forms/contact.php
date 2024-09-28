<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require 'C:\xampp\htdocs\ragampangan2\assets\vendor\php-email-form\PHPMailer-master\src\Exception.php';
  require 'C:\xampp\htdocs\ragampangan2\assets\vendor\php-email-form\PHPMailer-master\src\PHPMailer.php';
  require 'C:\xampp\htdocs\ragampangan2\assets\vendor\php-email-form\PHPMailer-master\src\SMTP.php'; // Make sure to adjust the path if you're not using Composer
  
  // Create a new PHPMailer instance
  $mail = new PHPMailer(true);
  
  try {
      // Server settings
      $mail->isSMTP(); // Set mailer to use SMTP
      $mail->Host = 'mx4.mailspace.id'; // Specify main and backup SMTP servers
      $mail->SMTPAuth = true; // Enable SMTP authentication
      $mail->Username = 'admin@ragampangan.com'; // SMTP username
      $mail->Password = 'Ragampangan.001'; // SMTP password
      $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 465; // TCP port to connect to
  
      // Recipients
      $mail->setFrom('admin@ragampangan.com', 'Website RPM');
      $mail->addAddress('admin@ragampangan.com'); // Add a recipient
  
      // Content
      $mail->isHTML(true); // Set email format to HTML
      $mail->Subject = 'Pesan masuk baru dari Website: ' . $_POST['subject'];
      $mail->Body    = 'Anda mendapatkan pesan baru dari website.<br><br>'
                      . 'Nama: ' . htmlspecialchars($_POST['name']) . '<br>'
                      . 'Email: ' . htmlspecialchars($_POST['email']) . '<br>'
                      . 'Subject: ' . htmlspecialchars($_POST['subject']) . '<br>'
                      . 'Pesan:<br>' . nl2br(htmlspecialchars($_POST['message']));
  
      $mail->send();
      echo json_encode("Your message has been sent. Thank you!");
  } catch (Exception $e) {
      echo json_encode("Unable to send email. Mailer Error: {$mail->ErrorInfo}");
  }

//OLD VERSION//
  // Replace contact@example.com with your real receiving email address
  /*
  $receiving_email_address = 'admin@ragampangan.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Message Sent!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  $contact->smtp = array(
    'host' => 'mx4.mailspace.id',
    'username' => 'admin@ragampangan.com',
    'password' => 'Ragampangan.001',
    'port' => '465'
  );

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
  
  */
?>
