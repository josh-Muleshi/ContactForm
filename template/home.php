<?php
use App\Class\htmlClasses\Table;
use App\Class\ContactManager;

$pageTitle = "Home Page";
$pageDescription = "My {$pageTitle} description";

$contactManager = new ContactManager();
$contacts = $contactManager->getAllContacts();

$table = new Table();

foreach ($contacts as $contact) {
    $table->addRow(['Id', $contact->getId()]);
    $table->addRow(['Nom', $contact->getName()]);
    $table->addRow(['Email', $contact->getEmail()]);
    $table->addRow(['Telephone', $contact->getPhone()]);
    $table->addRow(['Description', $contact->getDescription()]);
}

?>

<main class="container" style="padding-top: 100px">
    <div class="bg-light p-5 rounded ">
        <h1>liste de contact</h1>
        <?php echo $table->render(); ?>
    </div>
</main>