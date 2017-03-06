<?php

ini_set('memory_limit', '256M');
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Customer;
use App\Models\Account;
use App\Models\Deposit;
use App\Models\Withdraw;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class, 10)->create();
        $this->seedCustomer(10);
        $this->seedAccount(10);
        $this->seedDeposit(10);
        $this->seedWithdraw(10);
    }

    private function seedCustomer($limit)
    {
        $faker = Faker\Factory::create();
        $user = User::pluck('id')->all();
        for ($i = 0; $i < $limit; $i++) {
            User::find($user[$i])->profile()->save(
                new Customer([
                    'firstname' => $faker->firstName,
                    'lastname' => $faker->lastName,
                    'email' => $faker->unique()->safeEmail,
                    'bonus_percent' => rand(5, 20),
                    'gender' => array_rand(['male' => 1, 'female' => 2]),
                    'country' => $faker->country,
                    'user_id' => array_rand($user),
                 ])
            );
        }
    }

    private function seedAccount($limit)
    {
        $customer = Customer::pluck('id')->all();

        for ($i = 0; $i < $limit; $i++) {
            Customer::find($customer[$i])->bankAccount()->save(
                new Account([
                    'customer_id' => array_rand($customer),
                    'amount' => rand(1000, 9999),
                    'bonus' => rand(10, 500)
                ])
            );
        }
    }

    private function seedDeposit($limit)
    {
        $account = Account::pluck('id')->all();

        for ($i = 0; $i < $limit; $i++) {
            Account::find($account[$i])->deposit()->save(
                new Deposit(['account_id' => array_rand($account), 'amount' => rand(1000, 99990)])
            );
        }
    }

    private function seedWithdraw($limit)
    {
        $account = Account::pluck('id')->all();

        for ($i = 0; $i < $limit; $i++) {
            Account::find($account[$i])->withdraw()->save(
                new Withdraw(['account_id' => array_rand($account), 'amount' => rand(1000, 99990)])
            );
        }
    }
}
