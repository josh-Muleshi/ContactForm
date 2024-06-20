<?php

$pageTitle = "Add Page";
$pageDescription = "My {$pageTitle} description";

use App\Class\htmlClasses\{
    Button,
    Form,
    Input,
    Textarea,
};

use App\Class\{
    Cookie,
    Session
};

use App\Class\ContactManager;

$contactManager = new ContactManager();

Session::start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Session::set('name', $_POST['name']);
    Session::set('email', $_POST['email']);
    Session::set('phone', $_POST['phone']);
    Session::set('description', $_POST['description']);

    Cookie::set('username', $_POST['name'], 3600);

    $contactData = [
        'name' => Session::get('name', ''),
        'email' => Session::get('email', ''),
        'phone' => Session::get('phone', ''),
        'description' => Session::get('description', '')
    ];
    $contactManager->createContact($contactData);

    header('Location: home.php');
    exit;
}

$name = Session::get('name', '');
$email = Session::get('email', '');
$phone = Session::get('phone', '');
$description = Session::get('description', '');

$username = Cookie::get('username', 'M/Mme');

$form = new Form('', 'POST');
$form->addElement(new Input('text', 'name', $name, ['placeholder' => 'Nom']));
$form->addElement(new Input('email', 'email', $email, ['placeholder' => 'Email']));
$form->addElement(new Textarea('comments', $comments, ['placeholder' => 'Commentaires']));

$form->addElement(new Button('submit', 'Soumettre'));

?>

<h1>Ajoutez un Contact</h1>
<h2>Bienvenue, <?php echo htmlspecialchars($username); ?>!</h2>
<?php echo $form->render(); ?>