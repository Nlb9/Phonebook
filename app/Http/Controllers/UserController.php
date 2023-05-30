<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registerAction()
    {
        echo $this->blade->render('user.register', ['title' => 'Регистрация пользователя']);
    }

    public function insertRegisterAction()
    {
        if ($_POST['password'] === $_POST['password2']) {
            $model = new User;
            $model->name = $_POST['name'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $model->password = $password;
            $model->save();
            $this->view->redirect("/user/login");
        } else {
            throw new MyExceptions('user.register', 'пароли не совпадают');
        }
    }

    public function loginAction()
    {
        echo $this->blade->render('user.login', ['title' => 'Авторизация пользователя']);
    }

    public function verifyAction()
    {
        $current_user = User::where('name', $_POST['name'])->first();
        if (password_verify($_POST['password'], $current_user['password'])) {
            $_SESSION['user_id'] = $current_user['id'];
            $_SESSION['username'] = $_POST['name'];
            $_SESSION['is_admin'] = $current_user['isadmin'];
            $this->view->redirect("/contact/read");
        } else {
            throw new MyExceptions('user.login', 'Неверный пароль или имя');
        }
    }

    public function logoutAction()
    {
        session_unset();
        session_destroy();
        $this->view->redirect("/user/login");
    }

    public function readAction()
    {
        $users = User::all();
        echo $this->blade->render('user.read', ['title' => 'Отображение пользователей', 'users' => $users]);
    }

    public function editAction($id)
    {
        $model = User::find($id);
        echo $this->blade->render('user.edit', ['title' => 'Обновление пользователя', 'params' => $model]);
    }

    public function updateAction($id)
    {
        $isadmin = isset($_POST['isadmin']) ? 1 : 0;
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        User::where("id", $id)->update(['name' => $_POST['name'], 'password' => $password, 'isadmin' => $isadmin]);
        $this->view->redirect("/user/read ");
    }

    public function removeAction($id)
    {
        $model = User::where('id', $id);
        if ($model) {
            $model->delete();
        }
        $this->view->redirect("/user/remove");
    }
}
