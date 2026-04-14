<?php
// config/supabase.php

define('SUPABASE_URL', 'https://sedvwgvoesbzkoxnbdiq.supabase.co');
define('SUPABASE_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNlZHZ3Z3ZvZXNiemtveG5iZGlxIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NzQwMjc2MjYsImV4cCI6MjA4OTYwMzYyNn0.WQBOqv4l4mGdefpZoK6ViZYP4K0FO4gEqua2wP-nFN0');

/**
 * Insere um contato no Supabase
 *
 * @param string $name
 * @param string $email
 * @param string $message
 * @return bool
 */
function insertContact($name, $email, $message) {
    $url = SUPABASE_URL . '/rest/v1/contacts';
    
    // A tabela precisa ter os campos id, name, email, message, created_at.
    // O id e created_at devem ser automáticos no Supabase.
    $data = array(
        'name' => $name,
        'email' => $email,
        'message' => $message
    );

    $json_data = json_encode($data);

    $headers = array(
        "apikey: " . SUPABASE_KEY,
        "Authorization: Bearer " . SUPABASE_KEY,
        "Content-Type: application/json",
        "Prefer: return=representation"
    );

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    // Para simplificar homologação local, desativamos verificação de SSL se necessário (recomenda-se manter em produção)
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode >= 200 && $httpcode < 300) {
        return true;
    } else {
        error_log("Supabase Insert Error (Code: $httpcode): " . $response);
        return false;
    }
}
?>
