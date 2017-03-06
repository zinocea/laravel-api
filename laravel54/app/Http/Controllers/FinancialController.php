<?php

namespace App\Http\Controllers;

use App\Traits\BackWorker;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\Withdraw;
use App\Models\Account;

class FinancialController extends Controller
{
    /**
     * Back worker Trait
     */
    use BackWorker;

    public function show($id)
    {
        $customerId = $this->getCustomerId($id);
        $bankAccount = $this->customerAccount($customerId);
        return $bankAccount;
    }

    public function addDeposit(Request $request)
    {
        $id = $request->input('user_id');
        $amount = $request->input('amount');

        $customerId = $this->getCustomerId($id);
        $customer = Customer::find($customerId)->first();
        $bonusRatio = $customer['bonus_percent'] / 100;

        $bankAccount = $this->customerAccount($customerId);
        $accountId = $bankAccount['id'];
        $balance = $bankAccount['amount'];
        $oldBonus = $bankAccount['bonus'];
        $count = Deposit::where('account_id', $accountId)->count();

        Account::find($accountId)->deposit()->save(
            new Deposit(['account_id' => $accountId, 'amount' => $amount])
        );

        if ($this->isThird($count)) {
            $newBonus = $bonusRatio * $amount;
        } else {
            $newBonus = 0;
        }

        $newAmount = $balance + $amount;
        $bonus = $oldBonus + $newBonus;
        Account::find($accountId)
            ->update([
                'amount' => $newAmount,
                'bonus' => $bonus
            ]);
        return 'Deposit Added';
    }

    public function withDraw(Request $request)
    {
        $id = $request->input('user_id');
        $amount = $request->input('amount');

        $customerId = $this->getCustomerId($id);

        $bankAccount = $this->customerAccount($customerId);
        $accountId = $bankAccount['id'];
        $balance = $bankAccount['amount'];
        if ($balance < $amount) {
            return 'You Do not have Enough Money';
        }
        Account::find($accountId)->withdraw()->save(
            new Withdraw(['account_id' => $accountId, 'amount' => $amount])
        );
        $newAmount = $balance - $amount;

        Account::find($accountId)
            ->update([
                'amount' => $newAmount,
            ]);
        return 'Withdraw is DONE';
    }

    public function report()
    {
        return $this->reporting();
    }
}

