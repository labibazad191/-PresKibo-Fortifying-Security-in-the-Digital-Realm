<?php

function maskEmail($email) {
    // Split the email address into parts
    list($username, $domain) = explode('@', $email);

    // Mask a portion of the username (show only the first and last characters)
    $maskedUsername = substr($username, 0, 1) . str_repeat('*', max(strlen($username) - 2, 0)) . substr($username, -1);

    // Return the masked email address
    return $maskedUsername . '@' . $domain;
}

// Example usage:
$email = "user@example.com";
$maskedEmail = maskEmail($email);

echo "Original Email: $email\n";
echo "Masked Email: $maskedEmail\n";

?>
