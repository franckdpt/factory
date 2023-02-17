<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use kornrunner\Keccak;
use Elliptic\EC;
use App\Models\User;

class AuthDetection extends Component
{
    public $message;

    protected $listeners = [
        'onWalletConnected',
        'onWalletConnecting',
        'onWalletDisconnected',
        // 'onRegisterMessageSigned'
    ];

    public function render()
    {
        return view('livewire.auth-detection');
    }

    public function onWalletConnected($address)
    {
        if (!is_null($address)) {
            $user = User::firstOrCreate([
                'eth_address' =>  $address,
                'admin' =>  true
            ]);
            
            Auth::login($user);
            
            $this->emit('userConnected');
        }
    }

    public function onWalletConnecting()
    {
        $this->emit('userConnecting');
    }

    public function onWalletDisconnected()
    {
        Auth::logout();
        $this->emit('userDisconnected');
    }

    // Signature stuff

    // public function onRegisterMessageSigned($signature, $address) 
    // {
    //     $nonce = session()->get('metamask-nonce'); 
    //     $message = $this->getSignatureMessage($nonce);

    //     $this->verifySignature(
    //         $message, 
    //         $signature, 
    //         $address
    //     );

    //     $user = User::firstOrCreate([
    //         'eth_address' =>  $address
    //     ]);

    //     Auth::login($user);

    //     session()->forget('metamask-nonce');

    //     return true;
    // }

    // private function sendMessageToSign()
    // {
    //     $code = Str::random(8);

    //     session()->put('metamask-nonce', $code);
        
    //     $this->message = $this->getSignatureMessage($code);

    //     $this->dispatchBrowserEvent('register-message-generated');
    // }

    // private function verifySignature($message, $signature, $address): bool
    // {
    //     $hash = Keccak::hash(sprintf("\x19Ethereum Signed Message:\n%s%s", strlen($message), $message), 256);

    //     $sign = [
    //         "r" => substr($signature, 2, 64),
    //         "s" => substr($signature, 66, 64)
    //     ];

    //     $recId = ord(hex2bin(substr($signature, 130, 2))) - 27;

    //     if ($recId !== ($recId & 1)) {
    //         throw new \RuntimeException("Invalid Hex");
    //     }

    //     $publicKey = (new EC('secp256k1'))->recoverPubKey($hash, $sign, $recId);
        
    //     if ((string)Str::of($address)->after('0x')->lower() !=
    //         substr(Keccak::hash(substr(hex2bin($publicKey->encode('hex')), 1), 256), 24)) {

    //         throw new \RuntimeException("Invalid Signature Hash");
    //     }

    //     return true;
    // }

    // private function getSignatureMessage($code)
    // {
    //     return __("I have read and accept the terms and conditions.\nPlease sign me in.\n\nSecurity code (you can ignore this): :nonce", [
    //         'nonce' => $code
    //     ]);
    // }
}
