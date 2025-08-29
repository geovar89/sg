<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Παίρνουμε τα δεδομένα από τη φόρμα
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Προς ποιο email θα σταλεί
    $to = "geovar89@gmail.com"; // Αντικατέστησε με το δικό σου email

    // Δημιουργία του email headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Σώμα μηνύματος
    $body = "Όνομα: $name\n";
    $body .= "Email: $email\n";
    $body .= "Μήνυμα:\n$message\n";

    // Αποστολή email
    if (mail($to, $subject, $body, $headers)) {
        echo "Το μήνυμά σας στάλθηκε επιτυχώς!";
    } else {
        echo "Υπήρξε πρόβλημα στην αποστολή του μηνύματος.";
    }
} else {
    echo "Μη έγκυρη προσπέλαση.";
}
?>