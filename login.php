<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// E-posta adresi @sakarya.edu.tr ile bitmeli mi?
$expectedDomain = "@sakarya.edu.tr";
$studentNumber = '';

// E-posta geçerli formatta ve doğru domain'e ait mi?
if (filter_var($email, FILTER_VALIDATE_EMAIL) && strpos($email, $expectedDomain) !== false) {
    $studentNumber = strstr($email, '@', true); // @ öncesi kısmı al
}

// Eğer kullanıcı adı boş değilse ve şifre, kullanıcı adının aynısıysa
if (!empty($studentNumber) && $password === $studentNumber) {
    echo "<h2>Hoşgeldiniz $password</h2>";
    exit();
}

// Giriş başarısızsa kullanıcıyı geri yönlendir
echo "<script>
    alert('Giriş başarısız. Lütfen bilgilerinizi kontrol ediniz.');
    window.location.href = 'login.html';
</script>";
exit();
?>
