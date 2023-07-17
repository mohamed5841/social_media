<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // قراءة الملف JSON والتحقق من اسم المستخدم وكلمة المرور
    $usersFile = file_get_contents("css/users.json");
    $usersData = json_decode($usersFile, true);

    $validUser = false;
    foreach ($usersData as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $validUser = true;
            break;
        }
    }

    if ($validUser) {
        echo "تم تسجيل الدخول بنجاح";
        // قم بتوجيه المستخدم إلى صفحة الوجهة بعد تسجيل الدخول بنجاح
        // يمكنك استبدال "welcome.php" بالصفحة التي ترغب في توجيه المستخدم إليها
        // header("Location: welcome.php");
        // exit();
    } else {
        $errorMessage = "اسم المستخدم أو كلمة المرور غير صحيحة";
        header("Location: file1.html?error=$errorMessage");
        exit();
    }
}
?>
