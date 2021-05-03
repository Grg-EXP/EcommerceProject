<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;


class DataLayer extends Model
{

    public function listProducts($account)
    {
        $products = Product::where('user_id', $account)->orderBy('title', 'asc')->get();
        return $products;
    }
    public function getProduct($id)
    {
        $product = Product::where('id', $id)->get();
        return $product[0];
    }

    public function listAccounts($product)
    {
        $accounts = Account::where('user_id', $product)->get();
        return $accounts;
    }

    public function findAccountById($id)
    {
        return Account::find($id);
    }

    public function deleteProduct($id)
    {
        Product::where('id', '==', $id)->delete();
    }





    public function validUser($username, $password)
    {

        $users = Account::where('username', $username)->get(['password']);
        if (count($users) == 0) {
            return false;
        }

        return (md5($password) == $users[0]->password);
    }
}
