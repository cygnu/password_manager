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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccountRequest  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
