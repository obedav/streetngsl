<?php
// Enable error reporting for troubleshooting (uncomment in development, comment out in production)
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Initialize variables for form data
$name = $email = $phone = $subject = $department = $message = $newsletter = '';
$errors = [];
$success = false;

// Function to log errors for debugging
function logError($message) {
    $logFile = 'form_errors.log';
    $timestamp = date('Y-m-d H:i:s');
    $logMessage = "[$timestamp] $message\n";
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST['name'])) {
        $errors[] = "Name is required";
    } else {
        // Use htmlspecialchars instead of deprecated FILTER_SANITIZE_STRING
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    }
    
    // Validate email
    if (empty($_POST['email'])) {
        $errors[] = "Email is required";
    } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }
    }
    
    // Validate phone
    if (empty($_POST['phone'])) {
        $errors[] = "Phone number is required";
    } else {
        $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');
    }
    
    // Validate subject
    if (empty($_POST['subject'])) {
        $errors[] = "Subject is required";
    } else {
        $subject = htmlspecialchars($_POST['subject'], ENT_QUOTES, 'UTF-8');
    }
    
    // Validate department
    if (empty($_POST['department'])) {
        $errors[] = "Please select a department";
    } else {
        $department = htmlspecialchars($_POST['department'], ENT_QUOTES, 'UTF-8');
    }
    
    // Validate message
    if (empty($_POST['message'])) {
        $errors[] = "Message is required";
    } else {
        $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
    }
    
    // Check newsletter subscription
    $newsletter = isset($_POST['newsletter']) ? "Yes" : "No";
    
    // If no errors, process the form
    if (empty($errors)) {
        // Map departments to appropriate email addresses
        $department_emails = [
            'tavern' => 'tavern@streetngsl.com',
            'trendy' => 'trendy@streetngsl.com',
            'realtors' => 'realtors@streetngsl.com',
            'general' => 'info@streetngsl.com' // Default/fallback
        ];
        
        // Select appropriate recipient based on department or use default
        $to = isset($department_emails[$department]) ? $department_emails[$department] : 'info@streetngsl.com';
        
        // Add CC recipient (main email) if department-specific email is used
        $cc = ($to !== 'info@streetngsl.com') ? 'info@streetngsl.com' : '';
        
        // Set a proper From address that matches your domain
        $from_email = "no-reply@streetngsl.com"; // Must match your server's domain
        $from_name = "StreetNG Website";
        
        // Email subject with sanitized input
        $email_subject = "New Contact Form Submission: " . $subject;
        
        // Prepare email content with improved formatting
        $email_body = "You have received a new message from the StreetNG contact form.\n\n";
        $email_body .= "NAME: " . $name . "\n";
        $email_body .= "EMAIL: " . $email . "\n";
        $email_body .= "PHONE: " . $phone . "\n";
        $email_body .= "DEPARTMENT: " . $department . "\n";
        $email_body .= "SUBJECT: " . $subject . "\n\n";
        $email_body .= "MESSAGE:\n" . $message . "\n\n";
        $email_body .= "NEWSLETTER SUBSCRIPTION: " . $newsletter . "\n";
        $email_body .= "SUBMITTED ON: " . date('Y-m-d H:i:s') . "\n";
        
        // Improved headers with proper formatting
        $headers = "From: $from_name <$from_email>\r\n";
        $headers .= "Reply-To: $email\r\n";
        
        // Add CC if needed
        if (!empty($cc)) {
            $headers .= "Cc: $cc\r\n";
        }
        
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        // Try to send email
        $mail_sent = false;
        
        try {
            // First, check if mail function exists and is available
            if (!function_exists('mail')) {
                throw new Exception("PHP mail function is not available on this server.");
            }
            
            // Log the attempt
            logError("Attempting to send email to: $to with subject: $email_subject");
            
            // Attempt to send email
            $mail_sent = mail($to, $email_subject, $email_body, $headers);
            
            if (!$mail_sent) {
                throw new Exception("Failed to send email. Mail server may be unavailable.");
            }
            
            // Email was sent successfully
            logError("Email sent successfully to: $to");
            $success = true;
            
            // Send confirmation email to user
            sendConfirmationEmail($email, $name);
            
            // Clear form data after successful submission
            $name = $email = $phone = $subject = $department = $message = '';
            
        } catch (Exception $e) {
            // Log the specific error
            logError("Email sending failed: " . $e->getMessage());
            $errors[] = "We couldn't send your message. Please try again later or contact us directly by phone.";
        }
    }
}

/**
 * Function to send confirmation email to the user
 */
function sendConfirmationEmail($to_email, $to_name) {
    // Set proper From address
    $from_email = "no-reply@streetngsl.com"; // Use your actual domain
    $from_name = "StreetNG Contact";
    
    $subject = "Thank you for contacting StreetNG";
    
    $message = "Dear $to_name,\n\n";
    $message .= "Thank you for contacting StreetNG. We have received your message and will respond to your inquiry as soon as possible.\n\n";
    $message .= "Our team typically responds within 24-48 business hours.\n\n";
    $message .= "Best regards,\n";
    $message .= "The StreetNG Team\n";
    $message .= "Website: https://streetngsl.com\n";
    $message .= "Phone: +2347086067631\n";
    
    $headers = "From: $from_name <$from_email>\r\n";
    $headers .= "Reply-To: $from_email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    // Try to send confirmation email (don't stop process if this fails)
    try {
        mail($to_email, $subject, $message, $headers);
        logError("Confirmation email sent to: $to_email");
    } catch (Exception $e) {
        logError("Confirmation email failed: " . $e->getMessage());
        // Don't alert the user if confirmation fails
    }
}

// Redirect back to contact page with status
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($success) {
        header("Location: contact.html?status=success");
        exit;
    } else {
        // Store errors in session to display them
        session_start();
        $_SESSION['form_errors'] = $errors;
        $_SESSION['form_data'] = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'department' => $department,
            'message' => $message,
            'newsletter' => $newsletter
        ];
        header("Location: contact.html?status=error");
        exit;
    }
}
?>