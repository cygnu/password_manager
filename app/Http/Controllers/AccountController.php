<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Account;

class AccountController extends Controller
{
    public function getAllAccounts()
    {
        $accounts = Account::orderByDesc('updated_at')->paginate(20);

        return response($accounts, 200);
    }

    public function createAccount(Request $request)
    {
        $account = new Account;
        $account->account_name = $request->account_name;
        $account->account_image = $request->account_image;
        $account->email_address = $request->email_address;
        $account->password = $request->password;
        $account->is_multi_factor_authentication = $request->is_multi_factor_authentication;
        $account->is_use_oauth2 = $request->is_use_oauth2;
        $account->save();

        return response()->json([
            "message" => "Account record created"
        ], 201);
    }

    public function getAccount($account_id)
    {
        if (Account::where('account_id', $account_id)->exists()) {
            $account = Account::where('account_id', $account_id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($account, 200);
        } else {
            return response()->json([
              "message" => "Account not found"
            ], 404);
        }
    }

    public function updateAccount(Request $request, $account_id)
    {
        if (Account::where('$account_id', $account_id)->exists()) {
            $account = Account::find($account_id);
            $account->account_name = is_null($request->account_name) ? $account->account_name : $request->account_name;
            $account->email_address = $request->email_address;
            $account->password = $request->password;
            $account->is_multi_factor_authentication = $request->is_multi_factor_authentication;
            $account->is_use_oauth2 = $request->is_use_oauth2;
            $account->save();

            return response()->json([
                "message" => "Records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Account not found"
            ], 404);
        }
    }

    public function deleteAccount($account_id)
    {
        if(Account::where('account_id', $account_id)->exists()) {
          $account = Account::find($account_id);
          $account->delete();

          return response()->json([
            "message" => "Records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "Account not found"
          ], 404);
        }
    }
}
