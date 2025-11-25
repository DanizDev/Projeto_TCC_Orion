<?php
    require_once '../model/Conexao.php';

    USE PHPMailer\PHPMailer\PHPMailer;
    USE PHPMailer\PHPMailer\SMTP;
    USE PHPMailer\PHPMailer\Exception;

    require __DIR__ . '/../Model/PHPMailer/src/PHPMailer.php';
    require __DIR__ . '/../Model/PHPMailer/src/Exception.php';
    require __DIR__ . '/../Model/PHPMailer/src/SMTP.php';

    function AutenticatorPlus($email, $nome, $conexao){
        $mail = new PHPMailer(true);
        try{
            $mail ->isSMTP();
            $mail ->Host = 'smtp.gmail.com';
            $mail ->SMTPAuth = true;
            $mail ->Username = 'orionsuporte25@gmail.com';
            $mail ->Password = 'glwivbijuyqecdcy';
            $mail ->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail ->Port = 587;
            $mail ->CharSet = 'utf-8';
            $mail ->setLanguage('pt_br', __DIR__ . '/../Model/PHPMailer/language/phpmailer.lang-pt_br.php');
            $mail ->setFrom('orionsuporte25@gmail.com', 'OrionAI');

            $codigo = rand(100000, 999999);
            $dataAuth = date('Y-M-D H:i:s',time()+ 3060); 

            $insert = $conexao->prepare("
            INSERT INTO autenticacao (email, codigo, data_aut)
            VALUES (:email, :codigo, :data_aut)
            ON DUPLICATE KEY UPDATE codigo = :codigo2, data_aut = :data_aut2
            ");

            $insert->execute([
            ':email' => $email,
            ':codigo' => $codigo,
            ':data_aut' => $dataAuth,
            ':codigo2' => $codigo,
            ':data_aut2' => $dataAuth
        ]);

        $link = "" ;

        $mail ->addAddress($email,$nome);
        $mail ->isHTML(true); 
        $mail ->Subject ='codigo de autenticação';
        $mail ->Body = "<div style='font-family: Arial, sans-serif; background-color: #f3f0ff; padding: 20px;'>
            <table align='center' width='100%' style='max-width: 600px; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 0 8px rgba(0,0,0,0.1);'>
                <tr style='background-color: #7E3FF2;'>
                    <td style='padding: 20px; text-align: center;'>
                        <img src='https://i.imgur.com/qCy3Rsy.png' alt='OrionAI' width='100' style='display:block;margin:0 auto 10px auto;'>
                        <h1 style='color: #ffffff; font-size: 24px; margin: 0;'>Orion AI</h1>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 30px; color: #333333;'>
                        <h2 style='color: #7E3FF2;'>Olá, {$nome}!</h2>
                        <p>Recebemos uma solicitação para validar o acesso à sua conta.</p>
                        <p>Use o código abaixo para autenticação:</p>
                        <div style='background-color: #f3f0ff; border: 1px dashed #9C27F0; border-radius: 8px; text-align: center; padding: 15px; margin: 20px 0;'>
                            <span style='font-size: 28px; color: #7E3FF2; letter-spacing: 2px; font-weight: bold;'>$codigo</span>
                        </div>
                        <p>Ou, se preferir, valide diretamente clicando no botão abaixo:</p>
                        <p style='text-align: center;'>
                            <a href='$link'
                               style='background-color: #7E3FF2; color: #ffffff; padding: 12px 25px; text-decoration: none; 
                               border-radius: 6px; font-weight: bold; display: inline-block;'>
                               Validar Minha Conta
                            </a>
                        </p>
                        <p style='margin-top: 20px; font-size: 14px; color: #555;'>⚠️ Este código expira em <b>1 hora</b>.</p>
                    </td>
                </tr>
                <tr style='background-color: #f3f0ff; text-align: center;'>
                    <td style='padding: 15px; font-size: 12px; color: #777;'>
                        <p>© 2025 Orion AI — Todos os direitos reservados.</p>
                    </td>
                </tr>
            </table>
        </div>";

        $mail ->send();
            $update = $conexao->prepare("UPDATE Usuario 
                SET notificado = 1 
                WHERE email = :email");
                $update->execute([':email' => ['email']]);
    } catch (Exception $e) {

        echo "<script>
        alert('Erro ao enviar o e-mail: {$mail->ErrorInfo}');
        </script>";

    }

    }
    




?>