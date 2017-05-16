<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the addresses for the user.
     */
    public function addresses()
    {
        return $this->hasMany('App\Address');
    }
    /**
     * Get the orders for the user.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function count_orders(){
        $orders = $this->orders;
        return count($orders);
    }


    public function status(string $type) 
    {
        $orders = $this->orders;
        $count = count($orders); 
        $process = 0;
        $download = 0;
        if ($count > 0) 
        {
            foreach ($orders as $order)
            {
                if($order->status !== 'await' && $order->status !== 'downloaded') 
                {
                    $process ++; 
                } 
                if ($order->status === 'await') 
                {
                    $download ++;
                } 
            } 
        }
        if($type == 'process') {
            return $process;    
        }else {
            return $download;
        }
        
    }

    public function getProcess()
    {
        return $this->orders->where(
            'status', '<>', 'await','status', '<>', 'downloaded'
        );
    }

    public function getDownload()
    {

        return $this->orders->where('status', 'await');
    }
}
