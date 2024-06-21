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

// Créer un nouveau contact
$contactData = [
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'phone' => '1234567890',
    'description' => 'A new contact'
];
$contactManager->createContact($contactData);

// Obtenir tous les contacts
$contacts = $contactManager->getAllContacts();

// Mettre à jour un contact
$contactToUpdate = [
    'id' => 'existing-contact-id',
    'name' => 'Jane Doe',
    'email' => 'jane.doe@example.com',
    'phone' => '0987654321',
    'description' => 'Updated contact'
];
$contactManager->updateContact('existing-contact-id', $contactToUpdate);

// Supprimer un contact
$contactManager->deleteContact('existing-contact-id');

Session::start();

$truc = false;
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
    printf('well');
    
    var_dump($contactManager->createContact($contactData));
    $truc = true;

    header('Location: home');
    exit;
}

if ($truc) printf('well');

$name = Session::get('name', '');
$email = Session::get('email', '');
$phone = Session::get('phone', '');
$description = Session::get('description', '');

$username = Cookie::get('username', 'M/Mme');

$form = new Form('', 'POST');
$form->addElement(new Input('text', 'name', $name, ['placeholder' => 'Nom']));
$form->addElement(new Input('email', 'email', $email, ['placeholder' => 'Email']));
$form->addElement(new Input('phone', 'phone', $phone, ['placeholder'=> 'Telephone']));
$form->addElement(new Textarea('description', $description, ['placeholder' => 'Description']));

$form->addElement(new Button('submit', 'Soumettre'));

?>

<h1>Ajoutez un Contact</h1>
<h2>Bienvenue, <?php echo htmlspecialchars($username); ?>!</h2>
<?php echo $form->render(); ?>