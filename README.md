## KONT Videos

Additional:

1. BunnyNet
2. [PLayerJS](https://github.com/embedly/player.js)

### Detect mobile phone using Laravel

    composer require mobiledetect/mobiledetectlib

    php artisan make:provider MobileDetectServiceProvider

in app/providers/MobileDetectServiceProvider.php

```php

<?php

namespace App\Providers;

use Detection\MobileDetect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MobileDetectServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void{
        $browser = new MobileDetect();

        /* Share to all views */
        View::share('browser', $browser);
    }
}

```

Then inside your views

```php

@if ($browser->isMobile())
    
    Show mobile stuff...

@endif

```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
