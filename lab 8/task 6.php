<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class Account{
            private $accountID;
            private $accountBalance;
            private static $count=0;
            public function __construct($accountID, $accountBalance){
                $this->accountID=$accountID;
                $this->accountBalance=$accountBalance;
                self::$count++; // Increment count when a new account is created
            }

            public function getAccountID(){
                return $this->accountID;
            }
            public function getAccountBalance(){
                return $this->accountBalance;
            }
            public static  function getCount(){
                return self::$count;
            }
            public static function showInfo_of_bank(){
                echo"<br>Prinom Bank<br>";
                echo"Total Account: ", Account::getCount(),"<br>";
            }
            public function deposit($taka){
                $this->accountBalance=$this->accountBalance+$taka;
                echo "Deposited " . $taka . " taka successfully. New balance: " . $this->accountBalance . " taka.\n";
            }
            public function withdraw($taka){
                if ($this->accountBalance >= $taka) {
                    $this->accountBalance=$this->accountBalance - $taka;
                    echo "Withdrawn " . $taka . " taka successfully. New balance: " . $this->accountBalance . "taka. \n";
                } else {
                    echo "Insufficient balance. Withdrawal failed.\n";
                }
                
            }
            public function AccountInfo(){
                echo"<br>Account ID: ".$this->accountID."<br>Account Balance: ".$this->accountBalance."<br>";
            }
            public function transferMoney($accNum, $amount){
                if($this->accountBalance >= $amount){
                    $this->accountBalance-=$amount;
                    $accNum->deposit($amount);
                    echo "Transferred $" . $amount . " to account " . $accNum->accountID . " successfully.\n";
                } else {
                    echo "Insufficient balance. Transfer failed.\n";
                }
            }
        }

        $account1 = new Account(1, 1000);
        $account2 = new Account(2, 2000);

        echo "Total number of accounts created: " . Account::getCount() . "\n";

        $account1->AccountInfo();
        $account2->AccountInfo();

        $account1->deposit(500);
        $account1->withdraw(200);

        $account1->AccountInfo();
        $account2->AccountInfo();

        $account1->transferMoney($account2, 300); // sending object....!  (Calling & calle object concept)

        $account1->AccountInfo();
        $account2->AccountInfo();

        Account:: showInfo_of_bank();


    ?>
</body>
</html>