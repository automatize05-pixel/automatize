<?php
// api/contact.php — único endpoint PHP do site
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Método não permitido.']);
    exit();
}

$input = json_decode(file_get_contents('php://input'), true);

$name    = htmlspecialchars(strip_tags(trim($input['name']    ?? '')));
$email   = filter_var(trim($input['email']   ?? ''), FILTER_SANITIZE_EMAIL);
$message = htmlspecialchars(strip_tags(trim($input['message'] ?? '')));

if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Preencha todos os campos corretamente.']);
    exit();
}

// Supabase Config
$supabase_url = 'https://sedvwgvoesbzkoxnbdiq.supabase.co';
$supabase_key = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNlZHZ3Z3ZvZXNiemtveG5iZGlxIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NzQwMjc2MjYsImV4cCI6MjA4OTYwMzYyNn0.WQBOqv4l4mGdefpZoK6ViZYP4K0FO4gEqua2wP-nFN0';

$data = json_encode(['name' => $name, 'email' => $email, 'message' => $message]);

$ch = curl_init($supabase_url . '/rest/v1/contacts');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "apikey: $supabase_key",
    "Authorization: Bearer $supabase_key",
    "Content-Type: application/json",
    "Prefer: return=representation"
]);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpcode >= 200 && $httpcode < 300) {
    echo json_encode(['success' => true, 'message' => 'Mensagem enviada com sucesso!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao salvar. Tente novamente.']);
}
