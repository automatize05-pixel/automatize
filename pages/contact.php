<?php 
require_once '../config/supabase.php';

$success = false;
$error = false;
$message_text = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = htmlspecialchars(strip_tags(trim($_POST['name'] ?? '')));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags(trim($_POST['message'] ?? '')));

    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Envia para o Supabase usando o helper construído
        $result = insertContact($name, $email, $message);
        
        if ($result) {
            $success = true;
            $message_text = "Sua mensagem foi enviada com sucesso! A equipe Automatize+ entrará em contato em breve.";
        } else {
            $error = true;
            $message_text = "Ops! Ocorreu um problema de conexão com nossos servidores. Tente novamente mais tarde.";
        }
    } else {
        $error = true;
        $message_text = "Por favor, preencha todos os campos corretamente com dados autênticos.";
    }
}

include __DIR__ . '/../includes/header.php'; 
?>

<section class="page-header">
    <div class="container animate-on-scroll">
        <h1>Fale Conosco</h1>
        <p>Estamos prontos para dar o play na escala do seu negócio digital.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div style="max-width: 600px; margin: 0 auto; background: var(--white); padding: 40px; border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);" class="animate-on-scroll">
            
            <?php if (isset($success) && $success): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle" style="margin-right: 10px;"></i> <?php echo $message_text; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($error) && $error): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle" style="margin-right: 10px;"></i> <?php echo $message_text; ?>
                </div>
            <?php endif; ?>

            <form action="/pages/contact.php" method="POST">
                <div class="form-group">
                    <label for="name">Nome Completo</label>
                    <input type="text" id="name" name="name" required placeholder="João Lourenço...">
                </div>
                
                <div class="form-group">
                    <label for="email">E-mail Comercial</label>
                    <input type="email" id="email" name="email" required placeholder="joao@minhaempresa.com">
                </div>
                
                <div class="form-group">
                    <label for="message">Sua Mensagem / Descrição do Projeto</label>
                    <textarea id="message" name="message" required placeholder="Nos diga qual o objetivo do seu novo sistema..."></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%;">Enviar Mensagem</button>
            </form>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>

