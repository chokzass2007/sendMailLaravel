php artisan make:mail WelcomeMail


แก้ไขไฟล์ .env เปลี่ยนค่า MAIL_HOST เป็น เซิฟเวอร์ของระบบอีเมลของบริษัท

แก้ไขไฟล์ config/mail.php เปลี่ยนค่า verify_peer เป็น false
 'mailers' => [

        'smtp' => [
            'transport' => 'smtp',
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', 'เซิฟเวอร์ของระบบอีเมลของบริษัท'),
            'port' => env('MAIL_PORT', พอร์ต 25),
            'encryption' => env('MAIL_ENCRYPTION', 'null'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => 30,
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
            'auth_mode' => null,  // สำคัญสำหรับ Exchange Server
        ],
 ]
.env เปลี่ยน MAIL_MAILER เป็น smtp

MAIL_MAILER=smtp
MAIL_HOST=เซิฟเวอร์ของระบบอีเมลของบริษัท
MAIL_PORT=25
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=urc_notify@example.com
MAIL_FROM_NAME="ระบบ example"
MAIL_VERIFY_PEER=false

web.php เพิ่ม route เข้าไป
Route::get('/test', [MailController::class, 'sendWelcomeEmail']);

สร้าง controller ใหม่ เพิ่มไฟล์ MailController.php เข้าไปใน app/Http/Controllers

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class MailController 
{
    public function sendWelcomeEmail()
    {
        
        $data = [
            'name' => 'นำโชค จันทะดวง',
            'email' => 'urc_notify@universalrice.com'
        ];

        try {
            Mail::to('numchok.j@urcricemail.com')->send(new WelcomeMail($data));
            return "Email has been sent successfully!";
        } catch (\Exception $e) {
            return "Error sending email: " . $e->getMessage();
        }
    }
}
welcomeMail.php เป็นไฟล์ข้อความที่ส่งเมล์ไปยังผู้รับ