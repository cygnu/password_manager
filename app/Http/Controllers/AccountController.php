<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Modles\Content;
use App\Http\Requests\AccountRequest;

class AccountController extends Controller
{
    public function getAllAccounts()
    {
        $accounts = Account::orderByDesc('updated_at');

        return response()->json($accounts, 200);
    }

    public function createAccount(AccountRequest $request)
    {
        $account = new Account;
        $account->account_name = $request->account_name;
        $account->content_id = $request->content_id;
        $account->email_address = $request->email_address;
        $account->password = $request->password;
        $account->is_multi_factor_authentication = $request->is_multi_factor_authentication;
        $account->is_use_oauth2 = $request->is_use_oauth2;
        $account->save();

        return $account
            ? response()->json($account, 201)
            : response()->json([], 500);
    }

    public function getAccount($account_id)
    {
        if (Account::where('account_id', $account_id)->exists()) {
            $account = Account::where('account_id', $account_id)->get()->toJson(JSON_PRETTY_PRINT);
            return response()->json($account, 200);
        } else {
            return response()->json([
              "message" => "Account not found"
            ], 404);
        }
    }

    public function updateAccount(AccountRequest $request, $account_id)
    {
        if (Account::where('account_id', $account_id)->exists()) {
            $account = Account::find($account_id);
            $account->account_name = is_null($request->account_name) ? $account->account_name : $request->account_name;
            $account->content_id = is_null($request->content_id) ? $account->content_id : $request->content_id;
            $account->email_address = $request->email_address;
            $account->password = $request->password;
            $account->is_multi_factor_authentication = $request->is_multi_factor_authentication;
            $account->is_use_oauth2 = $request->is_use_oauth2;
            $account->save();

            return $account->update()
                ? response()->json($account, 200)
                : response()->json([], 500);
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
