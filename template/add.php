<?php

$pageTitle = "Add Page";
$pageDescription = "My {$pageTitle} description";

use App\Class\htmlClasses\{
    Button,
    Form,
    Input,
    Textarea,
};

use App\Class\ContactManager;

$form = new Form('/add', 'post');
$form->addElement(new Input('text', 'name', '', ['placeholder' => 'Nom']));
$form->addElement(new Input('email', 'email', '', ['placeholder' => 'Email']));
$form->addElement(new Input('phone', 'phone', '', ['placeholder'=> 'Telephone']));
$form->addElement(new Textarea('description', '', ['placeholder' => 'Description']));

$form->addElement(new Button('submit', 'Soumettre'));

$contactManager = new ContactManager();

if (!empty($_POST)) {
    $name = isset($_POST["name"]) ? $_POST["name"] : null; 
    $email = isset($_POST["email"]) ? $_POST["email"] : null; 
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : null; 
    $description = isset($_POST["description"]) ? $_POST["description"] : null; 

    $contactData = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'description' => $description
    ];
    
    $contactManager->createContact($contactData);

}

?>

<main class="container" style="padding-top: 100px">
    <div class="bg-light p-5 rounded">
        <h1>Ajoutez un Contact</h1>
        <h2>Bienvenue, <?php echo htmlspecialchars($name); ?>!</h2>
        <?php echo $form->render(); ?>
    </div>
</main>
