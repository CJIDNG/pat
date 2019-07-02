<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\InfoCollectionConversation;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Web\WebDriver;

use BotMan\BotMan\Cache\LaravelCache; // The secret sauce

class BotManController extends Controller
{
    private $config = [
        'conversation_cache_time' => 40, // Cache settings
        'user_cache_time' => 30, // Cache settings
        'web' => [ // Bringing in the web driver config
            'matchingData' => [
                'driver' => 'web',
            ],
        ]
    ];

    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        // Load the driver(s) you want to use
        DriverManager::loadDriver(WebDriver::class);

        // Create an instance
        $botman = BotManFactory::create($this->config, new LaravelCache(), app()->make('request'));
        
        $botman->hears('No', function($bot) {
            $bot->reply('Thank you for visiting! media freedom is a'.
                ' constitutionally guaranteed right and should be '.
                'protected. If you or any journalist you know suffer'.
                ' any violations of these rights, do return to the'.
                ' lawyer bot and we’ll help you.');
        });
        
        $botman->hears('Yes', self::class.'@startInformationCollection');

        $botman->listen();
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startInformationCollection(BotMan $bot)
    {
        $bot->startConversation(new InfoCollectionConversation());
    }
}