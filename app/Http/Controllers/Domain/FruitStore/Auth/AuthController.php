<?php

namespace App\Http\Controllers\Domain\FruitStore\Auth;

// ...
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Azate\LaravelTelegramLoginAuth\Contracts\Telegram\NotAllRequiredAttributesException;
use Azate\LaravelTelegramLoginAuth\Contracts\Validation\Rules\ResponseOutdatedException;
use Azate\LaravelTelegramLoginAuth\Contracts\Validation\Rules\SignatureException;
use Azate\LaravelTelegramLoginAuth\TelegramLoginAuth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AuthController
{

    /*
     * Telegram Auth Handle
     *
     * @created 2021/07/07
     * */
    public function handleTelegramCallback(TelegramLoginAuth $telegramLoginAuth, Request $request)
    {
        try {
            $user = $telegramLoginAuth->validateWithError($request);
            //Check has exits user
            //If not register => register => login

            $telegramId = $user->getId();
            $telegramFirstName = $user->getUsername();

            /** @var User $userModel */
            $userModel = User::query()
                ->where('telegram_id', $telegramId)
                ->first();

            //Has exits user
            if ($userModel) {
                //Login user
                Auth::guard('admin')->login($userModel);

                return redirect(route('admin.homeAdmin'));
            } else {
                //Create new user
                $dataUserCreate = [
                    'name' => $telegramId,
                    'first_name' => $telegramFirstName,
                    //'last_name' => $user->getLastName(),
                    'email' => $telegramId . '@example.com',
                    'password' => $user->getHash(),
                    'telegram_id' => $user->getId(),
                    //'token_api' => Str::random(16),
                ];


                $userCreate = User::create($dataUserCreate);

                //event(new Registered($userCreate));

                Auth::guard('admin')->login($userCreate);

                return redirect(route('admin.homeAdmin'));
            }
            //If has register => login
            //Todo login user


        } catch (NotAllRequiredAttributesException $e) {
            // ...
            Log::alert('Telegram Login Error: Not all require Attibute');
            //dd('12');
        } catch (SignatureException $e) {
            // ...
            //dd('12d');
            Log::alert('Telegram Login Error: Signature');
        } catch (ResponseOutdatedException $e) {
            // ...
            //dd('1sss2');
            Log::alert('Telegram Login Error: OutData');
        } catch (\Exception $e) {
            // ...
            //dd($e->getMessage());
            Log::alert('Telegram Login Error: OutData');
        }

        return redirect(route('admin.homeAdmin'))->with('success', 'User login!');
        // ...
    }
}
