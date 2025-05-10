<?php
// Enable error reporting for troubleshooting (disable in production)
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Initialize variables for form data
$name = $email = $phone = $service = $message = '';
$errors = [];
$success = false;

// Function to log errors for debugging
function logError($message) {
    $logFile = 'realtors_errors.log';
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
    
    // Validate service
    if (empty($_POST['service'])) {
        $errors[] = "Please select a service of interest";
    } else {
        $service = htmlspecialchars($_POST['service'], ENT_QUOTES, 'UTF-8');
    }
    
    // Validate message
    if (empty($_POST['message'])) {
        $errors[] = "Message is required";
    } else {
        $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
    }
    
    // If no errors, process the form
    if (empty($errors)) {
        // Recipient email
        $to = "realtors@streetngsl.com";
        
        // Set a proper From address that matches your domain
        $from_email = "inquiries@streetngsl.com"; // Use your actual domain
        $from_name = "Street Realtors Website";
        
        // Email subject
        $email_subject = "New Street Realtors Inquiry: " . $service;
        
        // Prepare email content
        $email_body = "You have received a new inquiry from the Street Realtors website.\n\n";
        $email_body .= "Name: $name\n";
        $email_body .= "Email: $email\n";
        $email_body .= "Phone: $phone\n";
        $email_body .= "Service of Interest: $service\n";
        $email_body .= "Message:\n$message\n";
        
        // Improved headers
        $headers = "From: $from_name <$from_email>\r\n";
        $headers .= "Reply-To: $email\r\n";
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
            
            // Attempt to send email
            $mail_sent = mail($to, $email_subject, $email_body, $headers);
            
            if (!$mail_sent) {
                throw new Exception("Failed to send email. Mail server may be unavailable.");
            }
            
            // Email was sent successfully
            $success = true;
            
            // Optional: Save to database
            // saveToDatabase($name, $email, $phone, $service, $message);
            
            // Send confirmation email to user
            sendConfirmationEmail($email, $name, $service);
            
            // Clear form data after successful submission
            $name = $email = $phone = $service = $message = '';
            
        } catch (Exception $e) {
            // Log the specific error
            logError("Email sending failed: " . $e->getMessage());
            $errors[] = "We couldn't send your inquiry. Please try again later or contact us directly by phone.";
        }
    }
}

/**
 * Function to send confirmation email to the user
 */
function sendConfirmationEmail($to_email, $to_name, $service) {
    // Set proper From address
    $from_email = "inquiries@streetngsl.com"; // Use your actual domain
    $from_name = "Street Realtors";
    
    $subject = "Your Real Estate Inquiry: $service";
    
    $message = "Dear $to_name,\n\n";
    $message .= "Thank you for contacting Street Realtors regarding $service.\n\n";
    $message .= "We have received your inquiry and one of our real estate professionals will contact you shortly.\n\n";
    $message .= "If you need immediate assistance, please contact us at:\n";
    $message .= "Phone: +2349047382343\n";
    $message .= "Email: realtors@streetngsl.com\n\n";
    $message .= "Best regards,\n";
    $message .= "Street Realtors Team\n";
    
    $headers = "From: $from_name <$from_email>\r\n";
    $headers .= "Reply-To: $from_email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    // Try to send confirmation email (don't stop process if this fails)
    try {
        mail($to_email, $subject, $message, $headers);
    } catch (Exception $e) {
        logError("Confirmation email failed: " . $e->getMessage());
        // Don't alert the user if confirmation fails
    }
}

// Optional: Database function (uncomment and configure if you have a database)
/*
function saveToDatabase($name, $email, $phone, $service, $message) {
    $servername = "localhost";
    $username = "your_db_username";
    $password = "your_db_password";
    $dbname = "your_database";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        logError("Database connection failed: " . $conn->connect_error);
        return false;
    }
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO realtors_inquiries (name, email, phone, service, message, submission_date) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssss", $name, $email, $phone, $service, $message);
    
    // Execute
    $result = $stmt->execute();
    
    if (!$result) {
        logError("Database insert failed: " . $stmt->error);
    }
    
    // Close connection
    $stmt->close();
    $conn->close();
    
    return $result;
}
*/

// Redirect back to realtors page with status
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($success) {
        header("Location: realtors.html?status=success#contact");
        exit;
    } else {
        // Store errors in session to display them
        session_start();
        $_SESSION['form_errors'] = $errors;
        $_SESSION['form_data'] = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'service' => $service,
            'message' => $message
        ];
        header("Location: realtors.html?status=error#contact");
        exit;
    }
}
?>