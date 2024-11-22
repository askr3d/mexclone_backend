<?php

namespace App\Providers;

use App\Interfaces\IAdicionalRepository;
use App\Interfaces\IAutoAdicionalRepository;
use App\Interfaces\ICiudadRepository;
use App\Interfaces\IPaisRepository;
use App\Interfaces\IAutoRepository;
use App\Interfaces\IMarcaRepository;
use App\Interfaces\IModeloRepository;
use App\Repository\AdicionalRepository;
use App\Repository\AutoAdicionalRepository;
use App\Repository\CiudadRepository;
use App\Repository\PaisRepository;
use App\Repository\AutoRepository;
use App\Repository\MarcaRepository;
use App\Repository\ModeloRepository;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IPaisRepository::class, PaisRepository::class);
        $this->app->bind(ICiudadRepository::class, CiudadRepository::class);
        $this->app->bind(IAutoRepository::class, AutoRepository::class);
        $this->app->bind(IMarcaRepository::class, MarcaRepository::class);
        $this->app->bind(IModeloRepository::class, ModeloRepository::class);
        $this->app->bind(IAdicionalRepository::class, AdicionalRepository::class);
        $this->app->bind(IAutoAdicionalRepository::class, AutoAdicionalRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('currencyConvert', function($dinero){
            return "<?php echo number_format($dinero, 2); ?>";
        });
    }
}
