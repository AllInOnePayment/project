<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Transaction\PaymentGatewayContract;
use App\Transaction\HelloCashPaymentGateway;
use App\Transaction\CbePaymentGateway;
use App\Transaction\AmolePaymentGateway;
use App\Transaction\YenePayPaymentGateway;
use App\Transaction\AllinPaymentGateway;
use App\Billing\BillingGateway;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Service;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {

            $userid = Auth::user()->id;
            $user  =   User::find($userid); 
            $amount = request()->amount;
            $phone = $user->phone;
            $bank = request()->bank; 
            if ($bank == 1) { 
                 return new HelloCashPaymentGateway($userid, $amount, $phone,$bank);
            }
            else if($bank == 2){
                 return new CbePaymentGateway($userid, $amount, $phone,$bank); 
            }
            else if($bank == 3){
                 return new AmolePaymentGateway($userid, $amount, $phone,$bank); 
            }
            else if($bank == 4){
                 return new AllinPaymentGateway($userid, $amount, $phone,$bank); 
            }
            else if($bank == 5){
                 return new YenePayPaymentGateway($userid, $amount, $phone,$bank); 
            }
        });

        $this->app->bind(BillingGateway::class, function ($app)
        {
            //dd('service provider');
            $id = request()->id;
            return new BillingGateway($id);
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
