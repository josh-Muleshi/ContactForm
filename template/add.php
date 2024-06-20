<?php

$pageTitle = "Add Page";
$pageDescription = "My {$pageTitle} description";

use App\Class\htmlClasses\{
    Button,
    Checkbox,
    Form,
    Input,
    Radio,
    Select,
    Textarea,
};

use App\Class\{
    Cookie,
    Session
};

Session::start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Session::set('name', $_POST['name']);
    Session::set('email', $_POST['email']);
    Session::set('comments', $_POST['comments']);
    Session::set('country', $_POST['country']);
    Session::set('newsletter', isset($_POST['newsletter']) ? 'Yes' : 'No');
    Session::set('gender', $_POST['gender']);

    Cookie::set('username', $_POST['name'], 3600);

    if (isset($_FILES['document']) && $_FILES['document']['error'] == UPLOAD_ERR_OK) {
        $uploadDirectory = 'uploads';
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }
        move_uploaded_file($_FILES['document']['tmp_name'], $uploadDirectory . '/' . $_FILES['document']['name']);
    }

    header('Location: resume.php');
    exit;
}

$name = Session::get('name', '');
$email = Session::get('email', '');
$comments = Session::get('comments', '');
$country = Session::get('country', '');
$newsletter = Session::get('newsletter', '');
$gender = Session::get('gender', '');

$username = Cookie::get('username', 'M/Mme');

$form = new Form('index.php', 'POST');
$form->addElement(new Input('text', 'name', $name, ['placeholder' => 'Nom']));
$form->addElement(new Input('email', 'email', $email, ['placeholder' => 'Email']));
$form->addElement(new Textarea('comments', $comments, ['placeholder' => 'Commentaires']));

$countries = ['cd' => 'rdc', 'us' => 'USA', 'uk' => 'UK'];
$form->addElement(new Select('country', $countries, ['value' => $country]));

$form->addElement(new Checkbox('newsletter', 'yes', $newsletter === 'Yes', ['label' => 'S\'abonner à la newsletter']));

$genders = ['male' => 'Homme', 'female' => 'Femme', 'other' => 'Autre'];
foreach ($genders as $value => $label) {
    $form->addElement(new Radio('gender', $value, $gender === $value, ['label' => $label]));
}

$form->addElement(new Input('file', 'document'));
$form->addElement(new Button('submit', 'Soumettre'));
?>

<h1>Ajoutez un Contact</h1>
<h2>Bienvenue, <?php echo htmlspecialchars($username); ?>!</h2>
<?php echo $form->render(); ?>