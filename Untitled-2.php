<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $age = htmlspecialchars(trim($_POST['age'] ?? ''));
    $position = htmlspecialchars(trim($_POST['position'] ?? ''));
    $experience = htmlspecialchars(trim($_POST['experience'] ?? ''));
    $education = htmlspecialchars(trim($_POST['education'] ?? ''));
    $languages = htmlspecialchars(trim($_POST['languages'] ?? ''));
    $comment = htmlspecialchars(trim($_POST['comment'] ?? ''));


    $errors = [];
    if (empty($name)) {
        $errors[] = "Pole 'Meno' je povinné.";
    }
    if (empty($email)) {
        $errors[] = "Pole 'Mail' je povinné.";
    }
    if (empty($phone)) {
        $errors[] = "Pole 'Telefonne čislo' je povinné.";
    }
    if (empty($position)) {
        $errors[] = "Pole 'Požadovaná poloha' je povinné.";
    }
    if (empty($languages)) {
        $errors[] = "Pole 'Znalosť jazykov' je povinné.";
    }
    if (!empty($errors)) {
        echo "<h1>Chyby vo formulári:</h1><ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<h1>Vaše údaje boli úspešne odoslané:</h1>";
        echo "<p><strong>Meno:</strong> $name</p>";
        echo "<p><strong>Mail:</strong> $email</p>";
        echo "<p><strong>Telefonne čislo:</strong> $phone</p>";
        echo "<p><strong>Veku:</strong> " . (!empty($age) ? $age : 'N/A') . "</p>";
        echo "<p><strong>Požadovaná poloha:</strong> $position</p>";
        echo "<p><strong>Pracovné skúsenosti:</strong> " . (!empty($experience) ? $experience : 'N/A') . "</p>";
        echo "<p><strong>Vzdelanie:</strong> " . (!empty($education) ? $education : 'N/A') . "</p>";
        echo "<p><strong>Znalosť jazykov:</strong> $languages</p>";
        echo "<p><strong>Komentarii:</strong> " . (!empty($comment) ? nl2br($comment) : 'N/A') . "</p>";
    }
} else {
    header('Location: form.html');
    exit;
}
